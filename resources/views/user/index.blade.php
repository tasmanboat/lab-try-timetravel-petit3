{{-- @extends('user.tmpl')
@section('title', "Users ($count)")

@section('content')
<div class="container">
  <h4 class="my-4">List</h4>
  @foreach ($users as $user)
    @include('user._user')
  @endforeach

</div>
@endsection --}}


@extends('user.tmpl')
@section('title', "Users ($count)")

@section('content')
<div class="container">
  <h4 class="my-4">List</h4>
  @foreach ($users as $user)
    @include('user._user')
  @endforeach

  <div class="d-flex justify-content-center">{!! $users->render() !!}</div>
</div>
@endsection
