<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;
use App\Movie;
use Illuminate\Support\Facades\DB;
use App\Ticket;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

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

    /**
     * This method get all information about today's rent film
     * Also we show all tickets for this film
     * @param type $id - movie id
     * @return view rent movie
     */
    public function show($id)
    {
        $rentMovie = Rent::where('id', '=', $id)->first();
         
        return view('rent.show', compact(['rentMovie']));
    }
    /**
     * Buy ticket method
     * @param Request $request
     * @return redirect to home page
     *
     */
    public function buy(Request $request)
    {
        $allInputs = $request->all();
        unset($allInputs["_token"]);
        foreach ($allInputs as $key => $place_id) {
            $ticket = new Ticket;
            $ticket->rent_id = 1;
            $ticket->place_id = (int)$place_id;
            $ticket->price_id = 1;
            $ticket->hashed_ticket_id = Uuid::uuid1()->toString();
            $ticket->save();
            // Ticket::store($arr);
        }
        return redirect()->route('home');
    }
}
