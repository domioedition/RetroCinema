@extends('layout')


@section('content')
    <br>
    <br>
    <h1>{{ $film->title }}</h1><hr>
    <p>{{ $film->poster }}</p>


    <a href="/{{ $film->id }}/tickets/"><button type="button" name="button">Buy ticket</button></a>
    <br>
    <br>
    <br>
    <br>
    <hr>
@endsection
