<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <title>Recipes</title>
</head>

<body>
<nav>
            <div class="navigation">
                <div class="nav-links">
                    <ul>
                        <li><a href="/recipes">All recipes</a></li>
                        <li><a href="/categories">Categories</a></li>
                    </ul>
                </div>
                <div><img src="" alt="">LOGO</div>
                <ul >
                    <!-- Authentication Links -->
                    @guest
                    <li >
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li >
                        <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                </ul>
                @else
                <div>
                    <div class="select-style-user">

                        <div class="dropdown">
                            <!-- <button class="mainmenubtn">Name of User</button> -->
                            <a class="mainmenubtn" href="#">{{ Auth::user()->name }} </a>
                            <div class="dropdown-child">
                                <a href="/user" onclick="event.preventDefault();">My Profile</a>
                                <a href="#" onclick="event.preventDefault();">My Recipes</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
            </div>
        </nav>