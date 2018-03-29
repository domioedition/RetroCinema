@extends('layout')


@section('content')

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Movies at this Theatre</h1>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        @foreach($movies as $movie)
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <h3><a href="rent/{{ $movie->id }}">{{ $movie->title }}</a></h3>
              <a href="rent/{{ $movie->id }}"><img src="{{ $movie->poster }}" alt="{{ $movie->title }}"></a>
              <div class="card-body">
                <p class="card-text">Start time: {{ $movie->time_start  }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="rent/{{ $movie->id }}"><button type="button" class="btn btn-sm btn-outline-secondary">Buy ticket</button></a>
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
