<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base-template.css') }}" rel="stylesheet">
    @yield('assets')
    <title>Document</title>
</head>
<body>
    <div class="navigation">
        <div class="left-section">
            <img src="{{ URL::asset('/assets/logo.svg') }}" alt="navigation-logo" class="nav-logo">
        </div>
        <div class="right-section">
            <ul class="menu-container">
                <li class="menu-item">
                    <a href="/">Home</a>
                </li>
                <li class="menu-item">
                    <a href="">About</a>
                </li>
                <li class="menu-item">
                    <a href="">Contacts</a>
                </li>
                <li class="menu-item">
                  <span class="user-icon user-btn">
                      <i class="far fa-user"></i>
                  </span>
                </li>
            </ul>
            <span class="icon-bars burger-btn">
                <i class="fas fa-bars"></i>
            </span>
        </div>
        <div class="drop-down-container">
            <div class="drop-down">
                <div class="drop-down-element">Our Blog</div>
                <div class="drop-down-element">Settings</div>
                @guest
                    <a href="/login" class="drop-down-element">Sign up/Sign in</a>
                @endguest
                @auth
                    <div class="drop-down-element sign-out">Sign out</div>
                @endauth
            </div>
        </div>
    </div>
    @yield('content')
    <!-- TODO create footer -->
</body>
</html>
