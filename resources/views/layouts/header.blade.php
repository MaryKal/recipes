<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="selectize.css" />

    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <!-- <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Recipes</title>

</head>

<body>

    <div class="wrapper">
        <header>
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
                                @if (\Auth::user()->isAdmin())
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

                <!-- @if (\Auth::user()->isAdmin())
                <a href="/admin">Admin panel</a>
                @endif -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                @endguest


            </nav>
            <div class="header-img">
                <h1>Super Mega Tasty Dishes</h1>
                <div class="search">
                    <form action="/search" method="GET">
                    <div class="search-items">
                        <input type="search" name="search" placeholder="Search">
                        <div class="cat-select">
                        <select name="category" id="">
                            <option value="">All categories</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn-solid btn-solid-search">Search</button>
                    </div>
                    </form>
                    
                </div>
            </div>
        </header>
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
        <!-- @if (isset($errors) && count($errors))
     
            There were {{count($errors->all())}} Error(s)
                        <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
                
        @endif -->
        <main>