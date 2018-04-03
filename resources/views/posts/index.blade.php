@extends('layout')


@section('content')

    <h1>All posts</h1>
    <p>here you can observe all created posts</p>
    @if($isAuthenticated)
        <a href="/posts/create">
            <button type="button" name="button" class="btn btn-success">Create</button>
        </a>
    @endif
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-8">
            @foreach($posts as $post)
                <h3><a href="posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <p>Author: {{ $post->user->name }}. Posted: {{ $post->created_at->toFormattedDateString() }}</p>
                <p>{{ $post->body }}</p>
                <hr>
            @endforeach
        </div>
    </div>


@endsection
