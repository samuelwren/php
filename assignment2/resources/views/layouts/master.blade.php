<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/wp.css')}}">

    <title>Social Media</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar bg-primary text-white">
            <div class="container">
                <div class="navbar-header">

                   <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand bg-primary text-white" href="{{ url('/post') }}">
                        Social Media
                    </a>
                    
                </div>
                
                <div class="collapse navbar-collapse bg-primary text-white" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    
                    <div id="searchBar" >
                        <form class="form-inline{{ $errors->has('searchUsers') ? ' has-error' : '' }} nav navbar-nav navbar-left" method="get" action="/user">
                            <div class="form-group{{ $errors->has('searchUsers') ? ' has-error' : '' }}">
                                <input id="search" type="text" name="searchUsers" placeholder="Search" required autofocus>
                                <button class="btn btn-info glyphicon glyphicon-search" type="submit"></button>
                            </div>
                        </form>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Redirects to the about page -->
                        <li><a class="bg-primary text-white" href="{{url("about") }}">About</a></li>
                        @if (Auth::guest())
                            
                        @else
                            <li><a class="bg-primary text-white" href="/user/ {{ Auth::user()->id }}">Profile</a></li>
                            <li><a class="bg-primary text-white" href="/friend/ {{ Auth::user()->id }}">Friends</a></li>
                        @endif
                        
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="bg-primary text-white" href="{{ route('login') }}">Login</a></li>
                            <li><a class="bg-primary text-white" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle bg-primary text-white" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstName }} {{ Auth::user()->lastName }} <span class="caret"></span>
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