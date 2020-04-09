@csrf


<input type="text" class="recipe-name" name="name" value="{{$recipe->name}}" class="rec-name" placeholder="Введите имя рецепта">
<!-- 
<input type="file" name="image" value="{{$recipe->image}}"> -->

<div class="form-group">
    <textarea class="" name="describe" placeholder="Введите краткое описание рецепта">
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
<!-- <input type="hidden" name="steps" id="steps" value="{{$recipe->steps}}"> -->

<div class="steps">
    <input type="file" name="image[]"  id="file" multiple/>
    <input type="text" name=""  />
</div>
<div class="steps">
    <input type="file" name="image[]"  id="file" multiple/>
    <input type="text" name=""  />
</div>

<button>Send</button>

