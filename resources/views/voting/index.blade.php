@extends('layout')

@section('content')
        <!--{{ $votings }}-->

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-8">Movie that participated in the voting</h1>
        <p class="lead">The voting ends on Saturday at 23:59</p>
    </div>
    <div class="card-deck mb-3 text-center">
        @foreach($votings as $vote)

            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"><a href="movies/{{ $vote->id }}">{{ $vote->title }}</a></h4>
                </div>
                <div class="card-body">
                    <p><a href="movies/{{ $vote->id }}"><img src="{{ $vote->poster }}" alt="{{ $vote->title }}"
                                                             class="img-fluid"></a></p>                                                             
                </div>
                <div class="card-footer">
                    <p>Here will be the time of start session when movie starts</p>
                    <p>Total votes: {{ $vote->votes_total }}</p>
                </div>
            </div>

        @endforeach
    </div>


@endsection
