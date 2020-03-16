@extends('layouts.full-width')
@csrf

<input type="text" class="" name="name" value="{{$recipes->title}}">

<select name="category">
    @foreach ($categories as $item)
    <!-- <option value="{{$item->id}}">{{$item->name}}</option> -->
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
</select>

<div class="form-group">
    <textarea class="" name="content">
    {{$recipes->describe}}
    </textarea>
</div>