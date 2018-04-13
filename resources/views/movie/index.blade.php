@extends('layout')


@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-8">Movies at this Theatre</h1>
        <p class="lead">Just choose your movie and enjoy watching.</p>
    </div>

    <div class="card-deck mb-3 text-center">
        @foreach($movies as $movie)

            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"><a href="movies/{{ $movie->id }}">{{ $movie->title }}</a></h4>
                </div>
                <div class="card-body">
                    <a href="movies/{{ $movie->id }}"><img src="{{ $movie->poster }}" alt="{{ $movie->title }}"
                                                           class="img-fluid"></a>
                </div>
            </div>

        @endforeach
    </div>

@endsection