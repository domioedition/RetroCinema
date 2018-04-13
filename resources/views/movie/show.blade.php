@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1>{{ $movie->title }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="{{ $movie->poster }}" alt="{{ $movie->title }}">
        </div>
        <div class="col-6">
            <h4>Description</h4>
            <p>{{ $movie->description }}</p>
            <p class="card-text">Imdb rating: {{ $movie->imdb_rating }}</p>
            <p class="card-text">Year of released: {{ $movie->released }}</p>
            <hr>
            <p>You can vote for this movie and if it wins we'll show it to you</p>

            <form action="/voting" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="movie_id" value="{{ $movie->id }}" hidden>
                </div>
                <button type="submit" class="btn btn-info">Vote</button>
            </form>
        </div>
    </div>

@endsection
