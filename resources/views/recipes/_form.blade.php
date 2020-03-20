@csrf

<input type="text" class="recipe-name" name="name" value="{{$recipe->name}}">



<div class="form-group">
    <textarea class="" name="describe">
    {{$recipe->describe}}
    </textarea>
</div>

<input type="hidden" name="slug" id="slug" value="{{$recipe->name}}">

<select name="category_id">
    @foreach ($categories as $item)
    <!-- <option value="{{$item->id}}">{{$item->name}}</option> -->
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
</select>




<button class="btn btn-primary">Send</button>