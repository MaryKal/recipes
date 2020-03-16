@extends('layouts.header')

@section('content')
    <h1>Create your recipe</h1>

    <form action="/recipes" method="POST" enctype="multipart/form-data">
        @csrf
        @include('recipes._form')
      </form>

     
@endsection