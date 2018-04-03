@extends('layout')


@section('content')

    <h1>{{ $post->title }}</h1>
    <hr>
    <p>{{ $post->body }}</p>
    <p>{{ $post->created_at->toFormattedDateString() }}</p>
    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->created_at->diffForHumans() }}:
                    <p>{{ $comment->body }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <hr>

    <div class="card">
        <div class="card-blocck">

            <form action="/posts/{{ $post->id }}/comments" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="body" cols="80" rows="10" placeholder="Your comment here."></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </div>
            </form>

        </div>
    </div>

@endsection
