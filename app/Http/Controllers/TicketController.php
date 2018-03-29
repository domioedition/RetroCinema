<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket.index');
    }

    public function create()
    {
      return view('ticket.create');
    }

    public function store()
    {
        //hash didn't work. need to fix it
        //$hashedTicketId = Hash::make(str_random(8));
        $this->validate(request(),[
        'rent_id' => 'required',
        'place_id' => 'required',
        'price_id' => 'required',
        ]);
      Ticket::create(request(['rent_id', 'place_id', 'price_id']));
      return redirect('/tickets');
    }
}
