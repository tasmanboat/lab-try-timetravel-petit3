@extends('user.tmpl')
@section('title', "New Post")

@section('content')
{{-- <h4>Post #{{ $post->id }}</h4> --}}
<div class="card">
  <div class="card-header"><h4>New Post</h4></div>
  <div class="card-body">
    <form method="POST" action="{{ route('posts.store') }}">
      {{ csrf_field() }}

      @include('user._errors')

      <div class="form-group">
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
      </div>
      <div class="form-group">
        <textarea name="content" id="content" rows="10" class="form-control">{{ old('content') }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-secondary" href="{{ route('posts.index') }}">Cancel</a>

    </form>
  </div>
</div>
@endsection

@section('script')
<script crossorigin src="https://unpkg.com/tinymce@5.8.2/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#content',
    plugins: 'code',
  });
</script>
@endsection
