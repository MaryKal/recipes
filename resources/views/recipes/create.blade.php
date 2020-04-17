@include('layouts.nav-panel')


<div class="add-rec">
<h1>Создайте свой рецепт</h1>

<div class="product-item-clean"  id="productItemClean" style="visibility: hidden; height:0;">
        <select class="js-example-basic-single"  id="products" name="products[]">
            @foreach($products as $product){
            <option value="{{$product->id}}" class="option" name="product_id">{{$product->name}}</option>
            }
            @endforeach
        </select>
        <input type="text" class="count" name="count[]">
        <input type="text" class="unit" name="unit[]">
    </div>

<form action="/recipes" method="POST" enctype="multipart/form-data" name="recipe">
        @csrf
        @include('recipes._form')
</form>
</div>
@include('layouts.footer')
