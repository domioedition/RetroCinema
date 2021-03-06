<?php

namespace App\Http\Controllers;

use App\System\Models\Movie;

class MovieController extends Controller
{
    /**
     *
     * Show all movies
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $movies = Movie::where('active', 1)->get();

        return view('movie.index', compact('movies'));
    }

    /**
     * Search movie in DB via $id
     * @param Movie $movie
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $movie = Movie::find($id);

        return view('movie.show', compact('movie'));
    }
}
