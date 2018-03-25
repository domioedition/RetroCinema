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
      {{ $comment->body }}
    </li>
  @endforeach
  </ul>
</div>
@endsection
