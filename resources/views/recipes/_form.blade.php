@csrf
<input type="text" class="recipe-name" name="name" value="{{$recipe->name}}" placeholder="Введите имя рецепта">

<div class="">
    <textarea class="" name="describe" placeholder="Введите краткое описание рецепта">
    {{$recipe->describe}}
    </textarea>
</div>

<input type="hidden" name="slug" id="slug" value="{{$recipe->name}}">

<label for="img">Выберите основное изображение</label>
<input type="file" name="img" value="{{$recipe->image}}"><br>

<label for="time">Время приготовления</label>
<input type="text" value="{{$recipe->time}}" name="time"><br>

<label for="persons">Количество персон</label>
<input type="text" value="{{$recipe->persons}}" name="persons"><br>
<div class="category">
    <label for="category_id">Выберите категорию</label>
    <select name="category_id">
        @foreach ($categories as $item)
        <!-- <option value="{{$item->id}}">{{$item->name}}</option> -->
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>


<h2>Введите необходимы продукты</h2>
<div class="new-product" id="new-product"></div>

<div class="center">
    <button class="btn add-product" id="add">+</button>
</div>

<div class="steps">
    <input type="file" name="image[]" id="file" multiple />
    <input type="text" name="" />
</div>

<div class="new-step"></div>
<div class="center">
    <button class="btn add-step">+</button>
</div>




<button class="btn-solid">Send</button>