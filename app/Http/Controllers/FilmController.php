<?php

namespace App\Http\Controllers;

use App\Film;

class FilmController extends Controller
{
    public function index()
    {
      $films = Film::all();
      return view('films.index', compact('films'));
    }

    public function show(Film $film)
    {
      return view('films.show', compact('film'));
    }

}
