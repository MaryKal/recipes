@extends('adminlte::page')



@section('content_header')

<h1>Создайте свой рецепт</h1>

@stop

@section('content')

<form action="/admin/recipes" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.recipes._form')
</form>


@endsection