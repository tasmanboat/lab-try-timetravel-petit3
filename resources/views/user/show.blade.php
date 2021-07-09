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
@endsection
