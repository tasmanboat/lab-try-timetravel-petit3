{{-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="{{ route('users.index') }}">☘️</a>
  <div class="collapse navbar-collapse d-flex justify-content-end">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="navbar-toggler-icon"></span>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('users.show', $user) }}">show user #{{ $user->id }}</a>
          <a class="dropdown-item" href="{{ route('users.edit', $user) }}">edit user</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('users.index') }}"><img src="{{ asset('assets/images/back.svg') }}" alt="back"></a>
        </div>
      </li>
    </ul>
  </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="{{ route('users.index') }}">☘️</a>
  <div class="collapse navbar-collapse d-flex justify-content-end">
    <ul class="navbar-nav">
      @if (Auth::check())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">show user #{{ Auth::user()->id }}</a>
          <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">edit user</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('users.index') }}"><img src="{{ asset('assets/images/back.svg') }}" alt="back"></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <form action="{{ route('logout') }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button class="btn btn-danger btn-block" type="submit" name="button">Logout</button>
            </form>
          </a>
        </div>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="navbar-toggler-icon"></span>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('users.index') }}"><img src="{{ asset('assets/images/back.svg') }}" alt="back"></a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-item d-flex justify-content-between">
          <a href="{{ route('login') }}">Login</a>
          <a href="{{ route('signup') }}">Register</a></div>
        </div>
      </li>
      @endif
    </ul>
  </div>
</nav>
