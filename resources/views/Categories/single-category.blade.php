@extends('layouts.main')




@section('content')
<div style="min-width: 600px">
    <h1>Category name: {{$category->name}}</h1>
    <p> Describe: {{$category->describe}}</p>
</div>
 <table>
     @foreach($recipes as $recipe)
     <tr>
         <td>{{$recipe->name}}</td>
     </tr>
     <tr>
         <td>{{$recipe->describe}}</td></tr>
     @endforeach
 </table>
@endsection