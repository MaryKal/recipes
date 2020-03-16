<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <title>Recipes</title>
</head>

<body>


    <header>
        <nav>
            <div class="navigation">
                <div class="nav-links">
                    <ul>
                        <li><a href="/recipes">All recipes</a></li>
                        <li><a href="/categories">Categories</a></li>
                    </ul>
                </div>
                <div><img src="" alt="">LOGO</div>
                <div>
                    <div class="select-style-user">

                        <div class="dropdown">
                            <button class="mainmenubtn">Name of User</button>
                            <div class="dropdown-child">

                                <a href="#">My recipes</a>
                                <a href="#">My Profile</a>
                                <a href="#">Log out</a>


                            </div>
                        </div>
                        <a href="recipes/" class="add-recipe-button">Add recipe </a>

                    </div>
                </div>
            </div>
        </nav>
        <div class="search">
            <div class="search-items">
                <input type="text" placeholder="Search" class="search-input">

                <div class="dropdown">
                    <button class="mainmenubtn">All categories</button>
                    <div class="dropdown-child">
                        @foreach($categories as $category)
                        <a href="/categories/{{$category->id}}">{{$category->name}}</a>
                        @endforeach

                    </div>
                </div>
                <button>Search</button>
            </div>
        </div>
    </header>