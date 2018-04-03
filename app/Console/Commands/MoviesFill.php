<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Movie;

class MoviesFill extends Command
{
    protected $moviesImdbIds = [
        'tt0094226',
        'tt0107529',
        'tt0120789',
        'tt0120689',
        'tt0111161',
        'tt0088194',
        'tt0123964',
        'tt1152836',
        'tt0097481',
        'tt0213149',
        'tt0338751',
        'tt0379725',
        'tt0373074',
        'tt0203019',
        'tt0119558',
        'tt1616195',
        'tt0824747',
        'tt0252501',
        'tt0975645',
        'tt0000010',
        'tt0000009',
        'tt0000008',
        'tt0000005',
        'tt0000004',
        'tt0000003',
        'tt0000002',
        'tt0000001',
    ];

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
        $client = new Client();

        foreach ($this->moviesImdbIds as $imdbId) {
            $res = $client->request('GET', 'http://www.omdbapi.com/?apikey=150f2314&i=' . $imdbId);
            $resultFromApi = json_decode($res->getBody());

            $preparedArr['imdb_id'] = $imdbId;
            $preparedArr['title'] = $resultFromApi->Title;
            $preparedArr['description'] = $resultFromApi->Plot;
            $preparedArr['released'] = $resultFromApi->Released;
            $preparedArr['poster'] = $resultFromApi->Poster;
            $preparedArr['imdb_rating'] = $resultFromApi->imdbRating;
            Movie::create($preparedArr);
//            sleep(5);
        }
    }
}
