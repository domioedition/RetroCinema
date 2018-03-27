@extends('layout')


@section('content')

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">The cinema shows movies today</h1>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
test
{{ $movies }}
        @foreach($movies as $movie)
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <p>test</p>
              <p>{{ $movie->id }}</p>
              <h3>{{ $movie->title }}</h3>
              <img src="{{ $movie->poster }}" alt="{{ $movie->title }}">
              <div class="card-body">
                <p class="card-text">Rating: {{ $movie->imdb_rating }}</p>
                <p class="card-text">Year: {{ $movie->released }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="movies/{{ $movie->id }}"><button type="button" class="btn btn-sm btn-outline-secondary">Buy ticket</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        @endforeach

      </div>
    </div>
  </div>

</main>
@endsection



@section('footer')
  <hr>
  asdfasdf

  asdfasdf
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  Footer
@endsection
