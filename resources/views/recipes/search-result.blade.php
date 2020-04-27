@extends('layouts.main')

@section('content')

 <h3>Результат поиска </h3>
@foreach ($recipes as $recipe)
<div class="recipe-card big-card">
    <div class="img">
    @if($recipe->image)
    <img src="{{asset($recipe->image)}}" alt=""> </div>
    @else
    <img src="images/no-image.png" alt=""> </div>
    @endif
    <div class="describe">
        <h2><a href="recipe/{{$recipe->id}}">{{$recipe->name}}</a></h2>
        <p>{{\Str::limit(strip_tags($recipe->describe), 200, '...')}}</p>
    </div>
</div>
@endforeach


@endsection

