<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Social Media</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar bg-primary text-white">
            <div class="container bg-primary text-white">
                <div class="navbar-header bg-primary text-white">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed bg-primary text-white" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only bg-primary text-white">Toggle Navigation</span>
                        <span class="icon-bar bg-primary text-white"></span>
                        <span class="icon-bar bg-primary text-white"></span>
                        <span class="icon-bar bg-primary text-white"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand bg-primary text-white" href="{{ url('/') }}">
                        Social Media
                    </a>
                </div>

                <div class="collapse navbar-collapse bg-primary text-white" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Redirects to the about page -->
                        <li><a class="bg-primary text-white" href="{{url("about") }}">About</a></li>
                        <li><a class="bg-primary text-white" href="#">Photos</a></li>
                        <li><a class="bg-primary text-white" href="#">Friends</a></li>
                        
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="bg-primary text-white" href="{{ route('login') }}">Login</a></li>
                            <li><a class="bg-primary text-white" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle bg-primary text-white" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstName }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu bg-primary text-white" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
