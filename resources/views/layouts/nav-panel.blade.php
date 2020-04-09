<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="jquery.fancybox.min.css"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    <title>Recipes</title>
</head>

<body>
    <div class="wrapper">
    <nav>
        <div class="navigation">
            <div class="nav-links">
                <ul>
                    <li><a href="/recipes">All recipes</a></li>
                    <li><a href="/categories">Categories</a></li>
                </ul>
            </div>
            <div><a href="/home/">LOGO</a></div>
            <ul>
                <!-- Authentication Links -->
                @guest
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
            </ul>
            @else
            <div>
                <div class="select-style-user">

                    <div class="dropdown">
                        <button class="dropbtn drop1"  href="#">{{ Auth::user()->name }} </button>
                        <div class="dropdown-content" id="profileDropdown">
                            <a href="/user">My Profile</a>
                            <a href="#" onclick="event.preventDefault();">My Recipes</a>
                            <a href="{{ route('logout') }}" onclick="
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </div>
                    <a href="/recipes/create" class="add-recipe-button">Add recipe </a>
                </div>
            </div>
            @if (Auth::user()->isAdmin())
            <a href="/admin">Admin panel</a>
            @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @endguest
        </ul>
       
    </nav>
    <main class="main">