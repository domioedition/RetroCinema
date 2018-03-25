@extends('layout')


@section('content')

<h1>All posts</h1>
<p>here you can observe all created posts</p>
<a href="/posts/create"><button type="button" name="button" class="btn btn-success">Create</button></a>
<br>
<br>
<br>


@foreach($posts as $post)
      <h3>{{ $post->title }}</h3>
      <p>{{ $post->body }}</p>
      <small>{{ $post->created_at->toFormattedDateString() }}</small>
      <a href="posts/{{ $post->id }}">view</a>
      <hr>
@endforeach

@endsection
