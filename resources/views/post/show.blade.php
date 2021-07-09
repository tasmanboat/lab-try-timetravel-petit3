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
{{-- <div class="card-body">
  <a href="{{ route('posts.show', $post) }}">Permanent link</a>
  | <a href="{{ route('posts.edit', $post) }}">Edit</a> |
  <a href="#">Delete</a>
</div> --}}
<div class="card-body">
  <a href="{{ route('posts.show', $post) }}">Permanent link</a>
  @can('update', $post->user)
  | <a href="{{ route('posts.edit', $post) }}">Edit</a> |
  <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
    onsubmit="return confirm('Confirm: delete Post #{{ $post->id }} ?');"
    style="display:inline !important;">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-link" style="padding:0 !important;">Delete</button>
  </form>
  @endcan
</div>
@endsection
