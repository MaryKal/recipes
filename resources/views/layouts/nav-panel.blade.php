<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Recipes</title>
</head>

<body>
    <div class="wrapper">
        <nav>

            <div class="nav-links">
                <ul>
                    <li><a href="/recipes">All recipes</a></li>
                    <li><a href="/categories">Categories</a></li>
                </ul>
            </div>
            <div><a href="/home/"><img src="/images/logo.png" alt=""></a></div>

            <!-- Authentication Links -->
            @guest
            <div class="guest-links">
            <a href="#" class="btn login-btn">{{ __('Login') }}</a>
                @if (Route::has('register'))
                <a href="#" class="btn-solid reg-btn">{{ __('Register') }}</a>
                @endif
            </div>

            @else

            <div class="user-links">
                <div class="select-style-user">

                    <div class="dropdown">
                        <button class="dropbtn drop1">{{ Auth::user()->name }} </button>
                        <div class="dropdown-content" id="profileDropdown">
                            <a href="/user">Мои рецепты</a>
                            @if (Auth::user()->isAdmin())
                            <a href="/admin">Admin panel</a>
                            @endif
                         
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>
                        </div>
                    </div>


                </div>
                <a href="/recipes/create" class="btn-solid">Add recipe </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            @endguest


        </nav>
        <div class="bg-popup-login">
            <div class="popup-content">
                @include('layouts._login')

            </div>
        </div>
        <div class="bg-popup-register">
            <div class="popup-content">
                @include('layouts._registration')

            </div>
        </div>
        <main class="main">