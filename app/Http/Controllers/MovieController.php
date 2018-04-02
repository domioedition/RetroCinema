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
      // $movies = Movie::all();

      // return view('movie.index', compact('movies'));
  }

  public function show(Movie $movie)
  {
    // return view('movie.show', compact('movie'));
  }

}
