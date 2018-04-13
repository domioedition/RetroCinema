<?php

namespace App\Http\Controllers;

class VotingController extends Controller
{
    public function index()
    {
        $ip = \Request::ip();
        dd($ip);
    }

    public function store()
    {
//        $this->validate(request(), [
//            'id_movie' => 'required',
//        ]);

        dd(request());


    }
}
