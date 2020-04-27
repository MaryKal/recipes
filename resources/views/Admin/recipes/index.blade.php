@extends('adminlte::page')

@section('content_header')
    <h1>Рецепты</h1>
@endsection

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Author</th>
                <th>Image</th>
                <th>Describe</th>
                <th>likes</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="recipes/{{$recipe->id}}/edit">{{$recipe->name}}</a></td>
            <td>{{$recipe->users->name}}</td>
            <td ><img src="{{$recipe->image}}" alt="" style="width: 200px; height:200px;"></td>
            
            <td>{{$recipe->describe}}</td>
            <td>{{$recipe->likes->count()}}</td>
            <td><a href="/admin/recipes/{{$recipe->id}}/edit" class="btn">Edit</a>
                    <form action="/admin/recipes/{{$recipe->id}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button class="btn danger">Delete</button>

                    </form></td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection

@section('js')
   
@endsection