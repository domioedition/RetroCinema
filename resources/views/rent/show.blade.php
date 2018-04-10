@extends('layout')


@section('content')

 <!--{{ $rentMovie }}--> 

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">.::Movie</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-4"><img src="{{ $rentMovie->movie->poster }}" alt="{{ $rentMovie->movie->title }}"></div>
    <div class="col-lg-8">
        <h1>{{ $rentMovie->movie->title }}</h1>
        <h4>Description:</h4>
        <p>{{ $rentMovie->movie->description }}</p>
        <p>Imdb rating: {{ $rentMovie->movie->imdb_rating }}</p>
        <p>Year of released: {{ $rentMovie->movie->released }}</p>
        <p>Time start: {{ $rentMovie->dtg }}</p>
    </div>
</div>
<hr>



<div class="row">
    <div class="col-lg-8">
    <h1>Tickets</h1>
    <hr>
    Booked:
    <ul>
    
    @foreach($rentMovie->tickets as $ticket)
        <li>{{ $ticket->place_id }}</li>
    @endforeach
    </ul>
    <h4>Please choose your seats</h4>
    <div class="bg-info">
      <p class="text-center">Screen here</p>
    </div>
      <div class="place free">1</div>
      <div class="place free">2</div>
      <div class="place free">3</div>
      <div class="place free">4</div>
      <div class="place free">5</div>
      <div class="place free">6</div>
      <div class="place free">7</div>
      <div class="place free">8</div>
      <div class="place free">9</div>
    </div>
    <div class="col-lg-3 booking">
    <h3>Reserved</h3>
    <p>These are your reserved seats</p>
    <ul class="list-group tickets_list"></ul>


        <div class="form-group">
            <h4>Total price:</h4><p id="total-sum"></p>
            <form id="pay" class="" action="/rent/1/buy" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary" id="buy">Add to cart</button>
                <button type="reset" class="btn btn-danger" id="reset">Reset</button>
            </form>


        </div>



    </div>
</div>






@endsection
