@extends('user.tmpl')
@section('title', "User #$user->id")

@section('content')
<div class="card-body">
  <div class="card-title"><h4>User #{{ $user->id }}</h4></div>
  <div class="card-text">
      <p class="font-weight-bold">{{ $user->name }}</p>
      <p>{{ $user->email }}</p>
  </div>
</div>

{{-- views/post/index.blade.php --}}
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
