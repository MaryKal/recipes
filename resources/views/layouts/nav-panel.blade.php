<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <!-- <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="jquery.fancybox.min.css"> -->
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
                            <button class="dropbtn drop1"  >{{ Auth::user()->name }} </button>
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
            @if (Auth::user()->isAdmin())
            <a href="/admin">Admin panel</a>
            @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        
        @endguest
        
       
    </nav>
    <main class="main">