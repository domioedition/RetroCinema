<?php

namespace App\Http\Controllers;

use App\Ticket;

class TicketController extends Controller
{
  public function index($id)
  {
    $tickets = Ticket::where('film_id', '=', $id)->get();
    return view('tickets.index', compact('tickets'));
  }
}
