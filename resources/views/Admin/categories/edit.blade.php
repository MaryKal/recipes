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


{!!Form::model($category, ['route'=>['categories.edit', $category->id],'method'=>'put'

])!!}

    @include('admin.categories._form')

{!! Form::close() !!}

@endsection

@section('js')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
         $('#lfm').filemanager('image');
    </script>
@endsection