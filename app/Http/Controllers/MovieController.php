<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Movie;

class MovieController extends Controller
{
  public function index()
  {
      $movies = Movie::all();
      return view('movie.index', compact('movies'));
  }

  public function show($id)
  {
    $movie = Movie::find($id);
    return view('movie.show', compact('movie'));
  }

  public function fill()
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
