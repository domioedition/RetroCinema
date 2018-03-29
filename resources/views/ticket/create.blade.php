@extends('layout')


@section('content')

<h1>Buying process</h1>
<hr>
<form class="" action="/tickets" method="POST">
  @csrf
<div class="form-group">
  <input type="text" name="place_id" class="form-control" placeholder="place id #"><br><br>
  <input type="text" name="rent_id" value="1" class="form-control" hidden>
  <input type="text" name="price_id" value="1" class="form-control" hidden>
  <button type="submit" name="button" class="btn btn-primary">Buy ticket</button>
</div>


@include('layouts.errors')
</form>




@endsection
