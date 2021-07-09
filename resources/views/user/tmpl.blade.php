<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <script defer src="{{ mix('/js/app.js') }}"></script>
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
  <div class="header">
    <div class="container">
      @include('user._header')
    </div>
  </div>
  <div class="main">
    <div class="container">
      @include('user._messages')
      @yield('content')
    </div>
  </div>
  <div class="footer">
    <div class="container">
      @include('user._footer')
    </div>
  </div>
</body>
</html>
