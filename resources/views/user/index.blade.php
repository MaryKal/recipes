@extends('layouts.main')


@section('content')

<h3>Мои рецепты</h3>

@foreach ($recipes as $recipe)
<div class="recipe-card big-card">
    <div class="img">
        @if($recipe->image)
        <img src="{{asset($recipe->image)}}" alt="">
    </div>
    @else
    <img src="images/no-image.png" alt="">
</div>
@endif
<div class="describe">
    <h2><a href="recipe/{{$recipe->id}}">{{$recipe->name}}</a></h2>
    <p>{{\Str::limit(strip_tags($recipe->describe), 200, '...')}}</p>
    <div class="icons">
        <ul>
            <li><i class="far fa-hourglass"></i>{{$recipe->time}}</li>
            <li></li>
        </ul>
        <ul>
            <li><a href="/recipes/{{$recipe->id}}/edit"><img src="images/edit.svg" alt=""></a> </li>
            <li>
                <form action="/recipes/{{$recipe->id}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button><img src="images/delete.svg" alt=""></button> 

                </form>
            </li>
        </ul>
    </div>
</div>
</div>


<!-- <a href="/recipes/{{$recipe->id}}/edit" class="btn">Edit</a> -->
<!-- <form action="/recipes/{{$recipe->id}}" method="POST">
    @method('DELETE')
    @csrf

    <button class="btn danger">Delete</button>

</form> -->
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