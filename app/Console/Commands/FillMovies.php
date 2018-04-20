<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\System\Models\Movie;

class FillMovies extends Command
{
    protected $moviesImdbIds = [
        'tt0083658',
        'tt6644200',
        'tt4154756',
        'tt1677720',
        'tt2231461',
        'tt4779682',
        'tt3778644',
        'tt1825683',
        'tt6772950',
        'tt2531344',
        'tt5104604',
        'tt1365519',
        'tt1413492',
        'tt2557478',
        'tt4986098',
        'tt4500922',
        'tt2798920',
        'tt5164432',
        'tt5360952',
        'tt5164214',
        'tt3606756',
        'tt5463162',
        'tt2873282',
        'tt1259528',
        'tt6450186',
        'tt6133466',
        'tt1590193',
        'tt6499752',
        'tt1620680',
        'tt3317234',
        'tt5616294',
        'tt1137450',
        'tt5580392',
        'tt3829266',
        'tt4669264',
        'tt1563742',
        'tt6791096',
        'tt5726086',
        'tt5427194',
        'tt4881806',
        'tt1502407',
        'tt5117670',
        'tt1270797',
        'tt6063050',
        'tt6142496',
        'tt5085924',
        'tt1477834',
        'tt4477536',
        'tt2296777',
        'tt0859635',
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

        foreach ($this->moviesImdbIds as $imdbId) {
            $res = $client->request('GET', 'http://www.omdbapi.com/?apikey=150f2314&i=' . $imdbId);
            $resultFromApi = json_decode($res->getBody());
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
            sleep(2);
        }

        /**
         *
         * Fill movies table with random movies
         *
         */

        /*for ($i = 0; $i < 1000; $i++) {
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
            $preparedArr['active'] = 1;
            Movie::firstOrCreate($preparedArr);
        }*/
    }


    public function generateRandomIdImdb()
    {
        $imdbId = 'tt0000';
        for ($i = 0; $i < 3; $i++) {
            $imdbId .= random_int(0, 9);
        }

        return $imdbId;
    }
}
