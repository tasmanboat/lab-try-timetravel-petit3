@extends('user.tmpl')
@section('title', "Edit User #$user->id")

@section('content')
{{-- <h4>User #{{ $user->id }}</h4> --}}
<div class="card">
  <div class="card-header"><h4>Edit User #{{ $user->id }}</h4></div>
  <div class="card-body">
    <form method="POST" action="{{ route('users.update', $user->id) }}">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      @include('user._errors')

      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $user->name }}">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>
</div>
@endsection
