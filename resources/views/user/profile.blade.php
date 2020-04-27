@extends('layouts.main')


@section('content')


<h2>{{$user->name}}</h2>
<h3>Рецепты</h3>
@foreach ($recipes as $recipe)
<div class="recipe-card big-card">
    <div class="img">
        @if($recipe->image)
        <img src="{{asset($recipe->image)}}" alt=""> </div>
    @else
    <img src="images/no-image.png" alt="">
</div>
@endif
<div class="describe">
    <h2><a href="/recipe/{{$recipe->id}}">{{$recipe->name}}</a></h2>
    <p>{{\Str::limit(strip_tags($recipe->describe), 200, '...')}}</p>
</div>
</div>

@endforeach



<div class="about">
    <div class="img">


    </div>
    <div class="describe">
        <h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, dicta itaque repellat labore minus quibusdam consequuntur tempore molestiae amet pariatur cupiditate consequatur sequi nesciunt aperiam esse repellendus! Asperiores tempora minima repudiandae maiores reprehenderit ex magnam quas? Ullam, ea. Fugiat, repellat.</p>
    </div>
</div>
@endsection