@extends('adminlte::page')


    
@section('content_header')
    <h1>Edit category</h1>
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!!Form::model($category, ['url'=>'admin/categories'])!!}

    @include('admin.categories._form')

{!! Form::close() !!}

@endsection

