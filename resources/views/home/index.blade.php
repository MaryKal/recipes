@extends('layouts.full-width')


@section('content')

<div class="pop-cat-wrapper">

    <h2 class="center ">Popular categories</h2>

    <div class="popular-categories">
        @foreach($categories as $category)
        <div style="background-image:url({{$category->img}});background-size:cover;">
            <h4><a href="categories/{{$category->id}}">{{$category->name}}</a></h4>
            <img src="" alt="">
        </div>
        @endforeach


    </div>
    <div class="center">
        <a href="/categories" class="all-categories-button">All categories</a>
    </div>
</div>
<div class="new-rec-wrapper">
    <h2 class="center">Newest recipes</h2>
    <div class="newest-recipes">
        @foreach($recipes as $recipe)
        <div>
            <h3><a href="recipes/{{$recipe->id}}">{{$recipe->name}}</a></h3>
            <img src="{{$recipe->image}}" alt="" style="width: 100px; height:50px;">
            <p>{{$recipe->describe}}</p>
        </div>
        @endforeach
    </div>
    <div class="center">
        <a href="recipes/" class="newest-recipes-button">View all recipes</a>
    </div>
</div>
@endsection