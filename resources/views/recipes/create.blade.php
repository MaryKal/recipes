@include('layouts.nav-panel')


<div class="add-rec">
    <h1>Добавить рецепт</h1>

    <div class="product-item-clean" id="productItemClean" style="visibility: hidden; height:0;">
    <div>
    <label for="count">Название продукта</label><br>

        <select class="js-example-basic-single" id="products" name="products[]">
            @foreach($products as $product)
            <option value="{{$product->id}}" class="option" name="product_id">{{$product->name}}</option>
            
            @endforeach
        </select>
        </div>
        <div>
        <label for="count">Количество единиц</label><br>
        <input type="text" class="count" name="count[]"><br>
        </div>
        <div>
        <label for="count">Единицы</label><br>

        <input type="text" class="unit" name="unit[]"><br>
        <label for="count">Например: кг, г, мл, стакан и тд</label>
        </div>
    </div>


    <form action="/recipes" method="POST" enctype="multipart/form-data" name="recipe">
        @if ($errors->any())
        <div class="alert alert-danger">

            @foreach ($errors->all() as $error)
            <h3>{{ $error }}</h3>
            @endforeach

        </div>
        @endif
        @csrf
        @include('recipes._form')
    </form>
</div>
@include('layouts.footer')