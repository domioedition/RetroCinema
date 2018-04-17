<?php

namespace App\Http\Controllers;

use App\Voting;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    public function index()
    {

        $voting = DB::table('voting')
            ->select('movie_id', DB::raw('count(votes) as total'))
            ->groupBy('movie_id')
            ->get();

        return view('voting.index', compact('voting'));
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
