<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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
                <div><a href="/home/">LOGO</a></div>


                <!-- Authentication Links -->
                @guest
                <div class="guest-links">
                    <a href="{{ route('login') }}" class="btn">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-solid">{{ __('Register') }}</a>
                    
                    @endif
                </div>

                @else

                <div class="user-links">
                    <div class="select-style-user">

                        <div class="dropdown">
                            <button class="dropbtn drop1">{{ Auth::user()->name }} </button>
                            <div class="dropdown-content" id="profileDropdown">
                                <a href="/user">My Profile</a>
                                <a href="#" onclick="event.preventDefault();">My Recipes</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </div>


                    </div>
                    <a href="/recipes/create" class="btn-solid">Add recipe </a>
                </div>

                @if (\Auth::user()->isAdmin())
                <a href="/admin">Admin panel</a>
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                @endguest


            </nav>
            <div class="search">
                <!-- <div class="search-items">
                <input type="text" placeholder="Search" class="search-input">

                <div class="dropdown">
                    <button class="dropbtn drop2">All categories</button>
                    <div class="dropdown-content" id="catDropdown">
                        @foreach($categories as $category)
                        <a href="/categories/{{$category->id}}" >{{$category->name}}</a>
                        @endforeach

                    </div>
                </div>
                <button>Search</button>
            </div> -->
            </div>
        </header>

        <main>