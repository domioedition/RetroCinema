<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovieSession;

class MovieSessionController extends Controller
{
    public function index()
    {
      $movies = MovieSession::all();
      return view('sessions.index', compact('movies'));
    }
}
