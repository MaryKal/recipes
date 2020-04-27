@csrf
<div class="main">
    <div class="photo">
        <input type="file" name="img" value="{{$recipe->image}}" class="">
        <img src="{{asset($recipe->image)}}" alt="" >
        <input type="hidden" name="img" value="{{$recipe->image}}" />
    </div>

    <div class="text">
        <div>
            <label for="name">Название рецепта</label><br>
            <input type="text" class="recipe-name" name="name" value="{{$recipe->name}}" placeholder="Введите имя рецепта">
        </div>
        <div class="describe">
            <label for="discribe">Описание рецепта</label><br>

            <textarea class="textarea" name="describe" placeholder="Введите краткое описание рецепта">
            {{$recipe->describe}}
            </textarea>
        </div>
    </div>

</div>

<div class="additional">
    <div class="category">
        <label for="category_id">Категория</label><br>
        <select name="category_id">
            @foreach ($categories as $item)

            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="time">
        <label for="time">Время приготовления</label><br>

        <input type="text" value="{{$recipe->time}}" name="time">
    </div>
    <div class="persons">
        <label for="persons">Количество персон</label><br>

        <input type="text" value="{{$recipe->persons}}" name="persons">
    </div>
</div>






<h2>Добавить ингридиенты</h2>
@foreach($recipe->products as $product)
<div class="existsProd">
<input value="{{$product->id}}" class="option" name="products[]">
<input type="text" class="count" name="count[]" value="{{$product->pivot->count}}">
<input type="text" class="unit" name="unit[]" value="{{$product->pivot->unit}}"> <br>
</div>
@endforeach

<div class="new-product" id="new-product"></div>

<div class="center">
    <button class="btn add-product" id="add">Добавить ингридиент</button>
</div>


<h2>Шаги приготовления</h2>
<label for="">Перечислите последовательность способа приготовления</label>

<div class="addStep">
    @foreach($recipe->steps as $step)
    @if($step->image)
    <div class="steps">
        <div class="photo">
            
            <img src="{{asset($step->image)}}" alt="" >
            <input type="hidden" name="existsStepImage[]" value="{{$step->image}}" />
        </div>

        <div class="text">
            @endif
            
            <label for="stepText[]">Описание шага приготовления</label>
            <textarea name="stepText[]" id="">{{$step->step}}</textarea>
            <!-- <input type="text" name="stepText[]" value="{{$step->step}}" /> -->
            
        </div>
        
    </div>
    @endforeach
</div>


<div class="new-step" id="new-step">

</div>

<div class="center">
    <button class="btn add-step">Добавить шаг</button>
</div>




<button class="btn-solid">Send</button>