@extends('layout')


@section('content')

<!-- {{ $rentMovie }} -->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">.::Movie</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-4"><img src="{{ $rentMovie[0]->poster }}" alt="{{ $rentMovie[0]->title }}"></div>
    <div class="col-lg-8">
        <h1>{{ $rentMovie[0]->title }}</h1>
        <h4>Description:</h4>
        <p>{{ $rentMovie[0]->description }}</p>
        <p>Imdb rating: {{ $rentMovie[0]->imdb_rating }}</p>
        <p>Year of released: {{ $rentMovie[0]->released }}</p>
        <p>Time start: {{ $rentMovie[0]->dtg }}</p>
        <p><a href="/tickets/{{ $rentMovie[0]->id }}/create"><button type="button" name="button" class="btn btn-success">Buy ticket</button></a></p>
    </div>
</div>
<hr>


<div class="row">
    <div class="col-lg-8">
    <h1>Ticketss</h1>
    <hr>
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
