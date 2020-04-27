@extends('layouts.main')

@section('content')
 
 <div class="pop-cat-wrapper">

<h2 class="center ">Choose category</h2>

<div class="popular-categories">
    @foreach($categories as $category)
    <div class="category-card cat-big" style="background-image:url({{$category->img}});background-size:cover;">
        <h4><a href="categories/{{$category->id}}">{{$category->name}}</a></h4>
    </div>
    @endforeach


</div>

</div>

@endsection