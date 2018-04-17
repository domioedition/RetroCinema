<?php

namespace App\Http\Controllers;

use App\Voting;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    public function index()
    {
        $votings = DB::table('movies')
                    ->join('votings', 'movies.id', '=', 'votings.movie_id')
                     ->select(DB::raw('count(votings.votes) as votes_total, votings.movie_id, movies.*'))
                     ->orderBy('votes_total', 'desc')
                     ->groupBy('votings.movie_id')
                     ->limit(3)
                     ->get();

        return view('voting.index', compact('votings'));
    }

    public function store()
    {
        $voting = new Voting();
        $voting->movie_id = request('movie_id');
        $voting->votes = 1;
        $voting->visitor = \Request::ip();
        $voting->save();

        return redirect('voting');
    }
}
