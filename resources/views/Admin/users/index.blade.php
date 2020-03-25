@extends('adminlte::page')

@section('content_header')
    <h1>Пользователи</h1>
@endsection

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>qty recipes</th>
                <th>Status</th>
                <th>Last activity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="users/{{$user->id}}/edit">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->recipe->count()}}</td>
            
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection

@section('js')
   
@endsection