<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;
use App\Movie;
use Illuminate\Support\Facades\DB;
use App\Ticket;


class RentController extends Controller
{
    public function index()
    {

        //TODO: implement relations

        $movies = DB::table('rents')->
                    join('movies', 'movies.id', '=', 'rents.movie_id')->
                    select('rents.*', 'movies.*')->get();
        return view('rent.index', compact('movies'));
    }

    public function show($id)
    {
        $tickets = Rent::find($id)->getTickets;

        // dd($tickets);

        $rentMovie = DB::table('rents')->
                        where('movie_id',$id)->
                        join('movies', 'movies.id', '=', 'rents.movie_id')->
                        select('rents.*', 'movies.*')->get();
        // dd($rentMovie);
        return view('rent.show', compact(['rentMovie', 'tickets']));
    }

    public function create()
    {

    }

    public function buy(Request $request)
    {
      $allInputs = $request->all();
      unset($allInputs["_token"]);
      $rent_id = 1;
      $price_id = 1;
      $hashed_ticket_id = 1;
      foreach ($allInputs as $key => $value) {
          Ticket::store();                  

      }
      dd($allInputs);
    }

}
