{{--<div class="card-body">
  // <div class="card-title"><h4>#{{ $user->id }} {{ $user->name }}</h4></div>
  <div class="card-text">
    <div class="d-flex justify-content-between">
      <h4>#{{ $user->id }} {{ $user->name }}</h4>
      <div class="d-flex justify-content-end">
        <div class="mx-4"><a href="{{ route('users.show', $user->id) }}">...</a></div>
      </div>
    </div>
  </div>
</div>
--}}

<div class="card-body">
  <div class="card-text">
    <div class="d-flex justify-content-between">
      <h4>#{{ $user->id }} {{ $user->name }}</h4>
      <div class="d-flex justify-content-end">
        <div class="mx-4"><a href="{{ route('users.show', $user->id) }}">...</a></div>
        @can('destroy', $user)
          <form action="{{ route('users.destroy', $user->id) }}" method="POST"
            onsubmit="return confirm('Confirm: delete User #{{ $user->id }} ?');">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
          </form>
        @endcan
      </div>
    </div>
  </div>
</div>
