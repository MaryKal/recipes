@extends('layouts.full-width')


@section('content')

<div class="pop-cat-wrapper">

    <h2 class="center ">Popular categories</h2>

    <div class="popular-categories">
        @foreach($categories as $category)
        <div class="category-card" style="background-image:url({{$category->img}});background-size:cover;">
            <h4><a href="categories/{{$category->id}}">{{$category->name}}</a></h4>
        </div>
        @endforeach


    </div>
    <div class="center">
       <a href="/categories" class="btn-solid">All categories</a>
    </div>
</div>
<div class="new-rec-wrapper">
    <h2 class="center">Newest recipes</h2>
    <div class="newest-recipes">
        @foreach($recipes as $recipe)
<div class="recipe-card">

            <img src="{{$recipe->image}}" alt="" >

     
            <h3><a href="/recipe/{{$recipe->id}}">{{\Str::limit(strip_tags($recipe->name), 15, '...')}}</a></h3>

            <p>{{\Str::limit(strip_tags($recipe->describe), 35, '...')}}
                                
            </p>

            <div class="rec-describe">
                <ul>
                    <li><i class="far fa-hourglass"></i>{{$recipe->time}}</li>
                    <li>                 
                    <i class="far fa-heart like {{$recipe->likesByUser ? 'red' : ''}}"    data-id="{{$recipe->id}}"></i>                        
                    <span class="like-count">{{$recipe->likes->count()}}</span>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <div class="center">
        <a href="recipes/" class="btn-solid">View all recipes</a>
    </div>
</div>

<div class="about">
    <div class="img">
    

    </div>
    <div class="describe">
        <h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, dicta itaque repellat labore minus quibusdam consequuntur tempore molestiae amet pariatur cupiditate consequatur sequi nesciunt aperiam esse repellendus! Asperiores tempora minima repudiandae maiores reprehenderit ex magnam quas? Ullam, ea. Fugiat, repellat.</p>
    </div>
</div>



@endsection