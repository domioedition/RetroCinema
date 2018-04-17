<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Movie;

class FillMovies extends Command
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
    protected $signature = 'Fill:Movies';

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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();

//        foreach ($this->moviesImdbIds as $imdbId) {
//            $res = $client->request('GET', 'http://www.omdbapi.com/?apikey=150f2314&i=' . $imdbId);
//            $resultFromApi = json_decode($res->getBody());
//
//            $preparedArr['imdb_id'] = $imdbId;
//            $preparedArr['title'] = $resultFromApi->Title;
//            $preparedArr['description'] = $resultFromApi->Plot;
//            $preparedArr['released'] = $resultFromApi->Released;
//            $preparedArr['poster'] = $resultFromApi->Poster;
//            $preparedArr['imdb_rating'] = $resultFromApi->imdbRating;
//            Movie::create($preparedArr);
//            //            sleep(5);
//        }

        /**
         *
         * Fill movies table with random movies
         *
         */

        for ($i = 0; $i < 100; $i++) {
            $imdbId = $this->generateRandomIdImdb();
            $res = $client->request('GET', 'http://www.omdbapi.com/?apikey=150f2314&i=' . $imdbId);
            $resultFromApi = json_decode($res->getBody());

            echo $resultFromApi->Response . " -> " . $resultFromApi->Title . " -> " . $resultFromApi->Plot . " -> " . $resultFromApi->Released . " -> " . $resultFromApi->Poster . " -> " . $resultFromApi->imdbRating."\n\n";

            if ($resultFromApi->Response === "False") {
                continue;
            }
            if ($resultFromApi->Title === 'N/A') {
                continue;
            }
            if ($resultFromApi->Plot === 'N/A') {
                continue;
            }
            if ($resultFromApi->Released === 'N/A') {
                continue;
            }
            if ($resultFromApi->Poster === 'N/A') {
                continue;
            }
            if ($resultFromApi->imdbRating === 'N/A') {
                continue;
            }

            $preparedArr['imdb_id'] = $imdbId;
            $preparedArr['title'] = $resultFromApi->Title;
            $preparedArr['description'] = $resultFromApi->Plot;
            $preparedArr['released'] = $resultFromApi->Released;
            $preparedArr['poster'] = $resultFromApi->Poster;
            $preparedArr['imdb_rating'] = $resultFromApi->imdbRating;
            Movie::create($preparedArr);
        }
    }


    public function generateRandomIdImdb()
    {
        $imdbId = 'tt00000';
        for ($i = 0; $i < 2; $i++) {
            $imdbId .= random_int(0, 9);
        }

        return $imdbId;
    }
}
