@include('layouts.nav-panel')


<div class="add-rec">
    <h1>Редактируйте свой рецепт</h1>
    @if ($errors->any())
    <div class="alert alert-danger">

        @foreach ($errors->all() as $error)
        <h3>{{ $error }}</h3>
        @endforeach

    </div>
    @endif
    <div class="product-item-clean" id="productItemClean" style="visibility: hidden; height:0;">
        <select class="js-example-basic-single" id="products" name="products[]">
            @foreach($products as $product)
            <option value="{{$product->id}}" class="option" name="product_id">{{$product->name}}</option>

            @endforeach
        </select>
        <input type="text" class="count" name="count[]">
        <input type="text" class="unit" name="unit[]">
    </div>

    <form action="/recipes/{{$recipe->id}}" method="POST" enctype="multipart/form-data" name="recipeUpdate">
        <input type="hidden" class="id" value="{{$recipe->id}}">
        @csrf
        @method('PUT')
        @include('recipes._form')
    </form>
</div>
@include('layouts.footer')