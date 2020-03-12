<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" >
    <title>Recipes</title>
</head>
<body>
    

    <header>
        <nav >
            <div class="navigation">
            <div class="nav-links">
                <ul>
                    <li><a href="#">All recipes</a></li>
                    <li><a href="#">Categories</a></li>
                </ul>
            </div>
            <div><img src="" alt="">LOGO</div>
            <div >
                <div class="select-style-user">
                <select name="profile-select" id="profile-select" >
                    <option value="" selected disabled>Name of User</option>
                    <option value=""><a href="#">My recipes</a></option>
                    <option value=""><a href="#">My profile</a></option>
                    <option value=""><a href="#">Log out</a></option>
                </select>
                <button class="add-recipe-button">Add recipe </button>

                </div>
            </div>
            </div>
        </nav>
        <div class="search">
            <div class="search-items" >
            <input type="text" placeholder="Search" class="search-input">
            <select name="categories-select" id="categories-select" class="select-style-categories">
                <option value="" selected><a href="#">All categories</a></option>
                <option value=""><a href="#">2</a></option>
                <option value=""><a href="#">3</a></option>
                <option value=""><a href="#">4</a></option>
                <option value=""><a href="#">5</a></option>
            </select>
            <button>Search</button>
            </div>
        </div>
    </header>
