@extends('layout')


@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-8">Rent movie. Here you could reserve and buy tickets.</h1>
        <p class="lead">Just choose your movie, buy tickets and enjoy watching.</p>
    </div>

    <div class="card-deck mb-3 text-center">
        @foreach($movies as $movie)

            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"><a href="rent/{{ $movie->id }}">{{ $movie->title }}</a></h4>
                </div>
                <div class="card-body">
                    <a href="rent/{{ $movie->id }}"><img src="{{ $movie->poster }}" alt="{{ $movie->title }}"
                                                         class="img-fluid"></a>
                    <h5 class="card-title pricing-card-title">Start: {{ $movie->dtg  }}</h5>
                </div>
                <div class="card-footer">
                    <a href="rent/{{ $movie->id }}">
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Buy ticket</button>
                    </a>
                </div>
            </div>

        @endforeach
    </div>





@endsection



@section('footer')
    <hr>
    asdfasdf

    asdfasdf
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    Footer
@endsection
