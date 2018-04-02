@extends('layout')


@section('content')

    <h1>Create new post</h1>
    <hr>
    <form class="" action="/posts" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="title"><br><br>
            <textarea name="body" rows="8" cols="80" class="form-control" placeholder="body"></textarea><br><br>
            <input type="text" name="user_id" value="1" class="form-control" hidden>
            <button type="submit" name="button" class="btn btn-primary">Publish</button>
        </div>


        @include('layouts.errors')
    </form>




@endsection
