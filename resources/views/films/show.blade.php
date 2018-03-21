@extends('layout')


@section('content')
    <br>
    <br>
    <h1>{{ $cinema->title }}</h1><hr>
    <p>{{ $cinema->poster }}</p>


    <a href="/{{ $cinema->id }}/tickets/"><button type="button" name="button">Buy ticket</button></a>
    <br>
    <br>
    <br>
    <br>
    <hr>
@endsection
