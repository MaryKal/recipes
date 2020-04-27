@csrf

<!-- <input type="text" class="recipe-name" name="name" value="{{$recipe->name}}" placeholder="Введите имя рецепта"> -->

<!-- <div class="">
    <textarea class="" name="describe" placeholder="Введите краткое описание рецепта">
    {{$recipe->describe}}
    </textarea>
</div> -->
<div class="form-group">
    <label for="name">Введите имя рцепта</label>
    <input type="text" class="recipe-name form-control" name="name" value="{{$recipe->name}}" placeholder="Введите имя рецепта">
</div>
<div class="form-group">
    <label for="describe">Краткое описание рецепта</label>
    <textarea class="form-control" name="describe" placeholder="Введите краткое описание рецепта">
    {{$recipe->describe}}
    </textarea>
</div>
<!-- <input type="hidden" name="slug" id="slug" value="{{$recipe->name}}"> -->

<label for="img">Выберите основное изображение</label>
<input type="file" name="img" value="{{$recipe->image}}"><br>
<img src="{{asset($recipe->image)}}" alt="">
<input type="hidden" name="img" value="{{$recipe->image}}" />

<div class="form-group">
    <label for="time">Время приготовления</label>
    <input type="text" value="{{$recipe->time}}" name="time">
</div>


<div class="form-group">
    <label for="persons">Количество персон</label>
    <input type="text" value="{{$recipe->persons}}" name="persons">
</div>



<div class="category">
    <label for="category_id">Выберите категорию</label>
    <select name="category_id" class="custom-select custom-select-md mb-3">
        @foreach ($categories as $item)
        <!-- <option value="{{$item->id}}">{{$item->name}}</option> -->
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>


<h2>Введите необходимы продукты</h2>
@foreach($recipe->products as $product)
<input value="{{$product->id}}" class="option" name="products[]">
<input type="text" class="count" name="count[]" value="{{$product->pivot->count}}">
<input type="text" class="unit" name="unit[]" value="{{$product->pivot->unit}}">
@endforeach
<div class="new-product" id="new-product"></div>

<div class="center">
    <button class="btn add-product btn-primary" id="add">Добавить продукт</button>
</div>

@foreach($recipe->steps as $step)
<div class="steps">
    <img src="{{asset($step->image)}}" alt="">
    <input type="hidden" name="stepImage[]" value="{{$step->image}}" />
    <input type="text" name="stepText[]" value="{{$step->step}}" />
</div>
@endforeach

<div class="new-step" id="new-step"></div>
<div class="center">
    <button class="btn add-step btn-primary">Добавить шаг</button>
</div>




<button class="btn-solid btn-primary">Send</button>