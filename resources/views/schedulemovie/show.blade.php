@extends('layout')


@section('content')
    <br>
    <br>
    <h1>{{ $movie->title }}</h1><hr>
    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}">
    <p>{{ $movie->description }}</p>
    <p class="card-text">Imdb rating: {{ $movie->imdb_rating }}</p>
    <p class="card-text">Year of released: {{ $movie->released }}</p>

    <a href="/{{ $movie->id }}/tickets/"><button type="button" name="button">Buy ticket</button></a>
    <br>
    <br>
    <br>
    <br>
    <hr>
@endsection
