@extends('user.tmpl')
@section('title', "Posts ($count)")

@section('content')
<div class="container">
  <h4 class="my-4">Posts ({{ $count }})</h4>
  <ul style="list-style-type: none;">
  @foreach ($posts as $post)
  <li class="d-flex justify-content-between">
    <h4><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h4>
    <span>{{ $post->created_at->format('Y-m-d') }}</span>
  </li>
  @endforeach
  </ul>

  <div class="d-flex justify-content-center">{!! $posts->render() !!}</div>
</div>
@endsection
