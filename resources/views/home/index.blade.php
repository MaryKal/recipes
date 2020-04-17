@extends('layouts.full-width')


@section('content')

<div class="pop-cat-wrapper">

    <h2 class="center ">Popular categories</h2>

    <div class="popular-categories">
        @foreach($categories as $category)
        <div class="category-card" style="background-image:url({{$category->img}});background-size:cover;">
            <h4><a href="categories/{{$category->id}}">{{$category->name}}</a></h4>
            <img src="" alt="">
        </div>
        @endforeach


    </div>
    <div class="center">
        <a href="/categories" class="btn">All categories</a>
    </div>
</div>
<div class="new-rec-wrapper">
    <h2 class="center">Newest recipes</h2>
    <div class="newest-recipes">
        @foreach($recipes as $recipe)
<div class="recipe-card">
 
            <img src="{{$recipe->image}}" alt="" style="width: 100%; height:40%;">
     
            <h3><a href="recipes/{{$recipe->id}}">{{$recipe->name}}</a></h3>

            <p>{{\Str::limit(strip_tags($recipe->describe), 40, '...')}}
                                
            </p>

            <div class="rec-describe">
                <ul>
                    <li><i class="far fa-hourglass"></i>{{$recipe->time}}</li>
                    <li>
                    <i class="far fa-heart like"  data-id="{{$recipe->id}}"></i>                        
                    <a href="#" class="like-count"></a>
                    </li>
                    
                    
                    <!-- <li>
                    <a class=" dislike" href="#" data-id="{{$recipe->id}}" data-isLiked="">dislike</a>                
                    </li> -->
                 
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <div class="center">
        <a href="recipes/" class="btn">View all recipes</a>
    </div>
</div>
@endsection