<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  
<div class="container-fluid">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ Request::getRequestUri() == '/' ? 'active' : '' }}" href="{{ url('/') }}">Category</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::getRequestUri() == '/sales' ? 'active' : '' }}" href="{{ url('/sales') }}">Sales</a>
    </li>
  </ul>
</div>

<div class="container-fluid">
  @yield('content')
</div>

</body>
<script src="/js/app.js"></script>
@yield('script')
</html>