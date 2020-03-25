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
            
            <td>{{$recipe->describe}}</td>
            <td>{{$recipe->likes}}</td>
            
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection

@section('js')
   
@endsection