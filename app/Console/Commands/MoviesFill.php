<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Movie;

class MoviesFill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Movies:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill DB table with movies information (imdbid, title, description, rating, poster, year publish, etc)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * Fill DB table with movies information (imdbid, title, description, rating, poster, year publish, etc).
     *
     */
    public function handle()
    {
        $moviesImdb = \App\MovieImdb::all();
        $client = new Client();

        foreach ($moviesImdb as $k => $movie) {
            $res = $client->request('GET', 'http://www.omdbapi.com/?apikey=150f2314&i=' . $movie->imdb_id);
            $resultFromApi = json_decode($res->getBody());

            $preparedArr['imdb_id'] = $movie->imdb_id;
            $preparedArr['title'] = $resultFromApi->Title;
            $preparedArr['description'] = $resultFromApi->Plot;
            $preparedArr['released'] = $resultFromApi->Released;
            $preparedArr['poster'] = $resultFromApi->Poster;
            $preparedArr['imdb_rating'] = $resultFromApi->imdbRating;
            Movie::create($preparedArr);
            sleep(5);
        }
    }
}
