@extends('layouts.main')


@section('content')


<h3>user profile {{$user->name}}</h3>
<p>Mail: {{$user->email}}</p>

<h3>User recipes</h3>
<table>
    <tr>
    <th>#</th>

        <th>Name</th>
        <th>Describe</th>
        <th>Category</th>
        <th>Likes</th>
    </tr>
    <tbody>
        @foreach($recipes as $recipe)
    <tr> 
        <td>{{$loop->iteration}}</td>
        <td><a href="/recipes/{{$recipe->id}}">{{$recipe->name}}</a></td>
        <td>{{$recipe->describe}}</td>
        <td>{{$recipe->categories->name}}</td>
        <td>{{$recipe->likes}}</td>
    </tr>
        @endforeach
    </tbody>

</table>
@endsection