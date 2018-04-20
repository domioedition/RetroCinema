<?php

namespace App\Http\Controllers;

class MovieTimeController extends Controller
{

    /**
     * This function helps get imdb ids
     */
    public function getIdsFromImdb()
    {
        $file = file_get_contents('https://www.imdb.com/search/title?year=2018&title_type=feature&');
        preg_match_all('/tt[0-9]{7}/', $file, $matches);
        $matches = array_unique($matches[0]);
        foreach ($matches as $match) {
            file_put_contents('imdbids.txt', "'" . $match . "'," . PHP_EOL, FILE_APPEND);
        }
    }
}
