@extends('user.tmpl')
@section('title', "Post #$post->id")

@section('content')
<div class="card-body">
  <div class="card-title"><h4>{{ $post->title }}</h4></div>
  <div class="card-subtitle my-4">
    by <a href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</a><br />
    created at {{ $post->created_at }}
  </div>
  <div class="card-text">{!! $post->content !!}</div>
</div>
<div class="card-body">
  <a href="{{ route('posts.show', $post) }}">Permanent link</a>
  | <a href="{{ route('posts.edit', $post) }}">Edit</a> |
  <a href="#">Delete</a>
</div>
@endsection
