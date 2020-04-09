@extends('adminlte::page')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="categories/{{$item->id}}/edit">{{$item->name}}</a></td>
            <td><img src="{{$item->img}}" alt="" style="width:200px; height:100px;"></td>
            
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection

@section('js')
   
@endsection