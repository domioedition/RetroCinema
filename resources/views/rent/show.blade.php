@extends('layout')


@section('content')

<!-- {{ $rentMovie }} -->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">.::Movie</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-4"><img src="{{ $rentMovie[0]->poster }}" alt="{{ $rentMovie[0]->title }}"></div>
    <div class="col-lg-8">
        <h1>{{ $rentMovie[0]->title }}</h1>
        <h4>Description:</h4>
        <p>{{ $rentMovie[0]->description }}</p>
        <p>Imdb rating: {{ $rentMovie[0]->imdb_rating }}</p>
        <p>Year of released: {{ $rentMovie[0]->released }}</p>
        <p>Time start: {{ $rentMovie[0]->time_start }}</p>
        <p><a href="/tickets/{{ $rentMovie[0]->id }}/create"><button type="button" name="button" class="btn btn-success">Buy ticket</button></a></p>
    </div>
</div>
<hr>    




<div class="row">
    <div class="col-lg-12">
        <h3>Tickets</h3>
        <!-- {{ $tickets }} -->
        <p>Busy place:</p>

        @for ($i = 0; $i <= 60; $i++)
            @if(isset($tickets[$i]))
                {{--The current value is {{ $i }}--}}
                <div class="place_busy">{{ $tickets[$i]->place_id }}</div>
            @else
                <div class="place_free">{{ $i }}</div>
            @endif
        @endfor
    </div>
</div>



@endsection