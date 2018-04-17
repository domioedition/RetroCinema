@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
        <h1>Movie that participated in the voting</h1>
        <!-- {{ $votings }} -->
        @foreach ($votings as $vote)
            <p>Movie id: {{ $vote->movie_id }}</p>
            <p>Votes: {{ $vote->votes_total }}</p>
            <hr>
        @endforeach
        </div>
    </div>



@endsection
