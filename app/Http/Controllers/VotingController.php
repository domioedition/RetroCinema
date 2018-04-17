<?php

namespace App\Http\Controllers;

use App\Voting;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    public function index()
    {
        $votings = DB::table('votings')
                     ->select(DB::raw('count(votes) as votes_total, movie_id'))
                     ->orderBy('votes_total', 'desc')
                     ->groupBy('movie_id')
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
