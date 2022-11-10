<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title ?? 'Basecamp'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/layout.css">
</head>
<body class="page-top">
    
   
    <header class="header">
        <a class="logo" href="/">Basecamp</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
          <li><a href="/" class="link link-theme link-arrow">HOME</a></li>
          {{-- <li><a href="#two" class="link link-theme link-arrow"></a></li> --}}
          <li><a href="/profile" class="link link-theme link-arrow">{{Auth::user()->name}}</a></li>
          <li>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frm-logout').submit();" class="link link-theme link-arrow">
            Logout
          </a></li>
        </ul>
      </header>
      <div id="main" class="main">
        {{ $slot }}

      </div>
</body>
</html>