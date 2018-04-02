<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $sessionId = $request->session()->getId();
        $this->validate(request(),[
        'rent_id' => 'required',
        'place_id' => 'required',
        'price_id' => 'required',
        ]);
      Ticket::create(request(['rent_id', 'place_id', 'price_id'], $sessionId));
      return redirect(route('tickets'));
    }
}
