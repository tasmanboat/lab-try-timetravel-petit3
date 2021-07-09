@extends('user.tmpl')
@section('title', 'Login')

@section('content')
{{-- <h4>User #{{ $user->id }}</h4> --}}
<div class="card">
  <div class="card-header"><h4>Login</h4></div>
  <div class="card-body">
    <form action="{{ route('login') }}" method="POST">
      {{ csrf_field() }}

      @include('user._errors')

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
      </div>

      <div class="form-group">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" name="remember">
          <label for="remember_me">Remember me</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

      <p class="my-4">Don't have an account? <a href="{{ route('signup') }}">Register now</a></p>

    </form>
  </div>
</div>
@endsection
