<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

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
      $this->validate(request(),[
        'rent_id' => 'required',
        'place_id' => 'required',
        'price_id' => 'required',
      ]);
      Ticket::create(request(['rent_id', 'place_id', 'price_id']));
      return redirect('/tickets');
    }
}
