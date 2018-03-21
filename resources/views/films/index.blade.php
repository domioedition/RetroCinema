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

        @foreach($films as $film)
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <h3>{{ $film->title }}</h3>
              <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Film poster">
              <div class="card-body">
                <p class="card-text">Description</p>
                <p class="card-text">Rating: {{ $film->rating }}</p>
                <p class="card-text">Year: {{ $film->year }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="films/{{ $film->id }}"><button type="button" class="btn btn-sm btn-outline-secondary">About film</button></a>
                    <a href="films/{{ $film->id }}"><button type="button" class="btn btn-sm btn-outline-secondary">Buy ticket</button></a>
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
  Footer
@endsection
