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
            <th>Blocked date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="users/{{$user->id}}/edit">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->recipe->count()}}</td>
            <td>{{$user->blocked_date}}</td>
            <td>
                @if($user->blocked_date == null)
                <form action="{{route('block.user', $user->id)}}" method="POST">
                    @csrf

                    <button class="btn btn-danger" value="">Block</button>

                </form>
                @else
                <form action="{{route('unblock.user', $user->id)}}" method="POST">
                    @csrf

                    <button class="btn btn-primary" >Unblock</button>

                </form>

                @endif

            </td>

        </tr>
        @endforeach

    </tbody>
</table>
@endsection

@section('js')

@endsection