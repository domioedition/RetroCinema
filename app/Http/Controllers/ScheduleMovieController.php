<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\ScheduleMovie;

class ScheduleMovieController extends Controller
{

  public function index()
  {
      $movies = ScheduleMovie::all();
      return view('schedulemovie.index', compact('movies'));
  }

  public function show($id)
  {
    $movie = ScheduleMovie::find($id);
    return view('schedulemovie.show', compact('movie'));
  }

  public function fill()
  {
    //
    // $moviesImdb = \App\MovieImdb::all();
    // $client = new Client();
    //
    // foreach ($moviesImdb as $k => $movie) {
    //   $res = $client->request('GET', 'http://www.omdbapi.com/?apikey=150f2314&i=' . $movie->imdb_id);
    //   $resultFromApi = json_decode($res->getBody());
    //
    //   $preparedArr['imdb_id'] = $movie->imdb_id;
    //   $preparedArr['title'] = $resultFromApi->Title;
    //   $preparedArr['description'] = $resultFromApi->Plot;
    //   $preparedArr['released'] = $resultFromApi->Released;
    //   $preparedArr['poster'] = $resultFromApi->Poster;
    //   $preparedArr['imdb_rating'] = $resultFromApi->imdbRating;
    //   ScheduleMovie::create($preparedArr);
    //   sleep(5);
    // }
  }


}
