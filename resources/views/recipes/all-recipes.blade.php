@extends('layouts.main')

@section('content')


@foreach ($recipes as $recipe)
<div class="recipe-card big-card">
    <div><img src="{{asset($recipe->image)}}" alt=""> </div>
    <div>
        <h2><a href="recipes/{{$recipe->id}}">{{$recipe->name}}</a></h2>
        <p>{{$recipe->describe}}</p>
    </div>
</div>
@endforeach
       
            {!! $recipes->render();!!}

@endsection