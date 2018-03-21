@extends('layout')


@section('content')

<h1>Tickets</h1>

    @foreach($tickets as $ticket)

      <!-- <h3>{{ $ticket->seat }}</h3> -->

      @if(!isset($tickets->seat))
        <input class="place_buzy" type="button" id="{{ $ticket->seat }}" value="{{ $ticket->seat }}">
      @else
        <p>qqq</p>
        <input class="place_free" type="button" id="1" value="1">
      @endif


  @endforeach



  <div class="hall" id="hall">

          <input class="place_free" type="button" id="2" value="2">
          <input class="place_free" type="button" id="3" value="3">
          <input class="place_free" type="button" id="4" value="4">
  </div>


@endsection
