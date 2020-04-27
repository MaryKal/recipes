@extends('adminlte::page')

@section('content_header')
    <h1>Комментарии</h1>
@endsection

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Author</th>
                <th>Text</th>                
                <th>Recipe</th>                
                <th>btns</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$comment->user->name}}</td>      
            <td>{{$comment->comment}}</td>
            <td>{{$comment->recipe->name}}</td>
            
      
                  
            
            
            <td><a href="/comments/{{$comment->id}}/edit" class="btn">Edit</a>
                    <form action="/comments/{{$comment->id}}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button class="btn danger">Delete</button>

                    </form>
            </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection