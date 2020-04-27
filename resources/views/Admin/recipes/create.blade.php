@extends('adminlte::page')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="add-rec">
    <h1>Создайте свой рецепт</h1>

    <div class="product-item-clean input-group mb-3" id="productItemClean" style="visibility: hidden; height:0;">
        <select class="js-example-basic-single" id="products" name="products[]">
            @foreach($products as $product)
            <option value="{{$product->id}}" class="option" name="product_id">{{$product->name}}</option>
            
            @endforeach
        </select>
        <input type="text" class="count form-control" name="count[]">
        <input type="text" class="unit form-control" name="unit[]">
    </div>


    <form action="/recipes" method="POST" enctype="multipart/form-data" name="recipe">
    <div class=" col-8">
        @if ($errors->any())
        <div class="alert alert-danger">

            @foreach ($errors->all() as $error)
            <h3>{{ $error }}</h3>
            @endforeach

        </div>
        @endif
        @csrf
        @include('admin.recipes._form')
        </div>
    </form>
    </div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
        // const axios = require("axios").default; //подключени axios
if (document.forms.recipe) {
    const addStep = document.querySelector(".add-step");
    const newStep = document.querySelector(".new-step");
    const RemoveNewStep = document.querySelector(".remove-step");
    const steps = document.querySelector(".steps");
    const newProduct = document.querySelector(".new-product");
    const addNewProduct = document.querySelector(".add-product");
    const prodItem = document.querySelector(".product-item-clean");

    function addNewStep(e) {
        // e.preventDefault();
        let div = document.createElement("div");
        div.className = "steps";

        div.innerHTML = `
                                <input type="file" name="stepImage[]"  id="file" multiple value="null" />
                                <input type="text" name="stepText[]"  />                       
                            `;
        newStep.append(div);
    }
    addStep.addEventListener("click", e => {
        e.preventDefault();
        addNewStep();
    });

    document.forms.recipe.addEventListener("submit", function(e) {
        e.preventDefault();

        // console.log(step);

        const fd = new FormData(this);

        // fd.append('steps', step);

        axios({
            method: "post",
            url: "/recipes/add",
            data: fd,
            headers: {
                "Content-Type": "multipart/form-data"
            }
        })
            .then(response => {
                console.log("ANSWER :", response);
            })
            .then(function(data) {
                console.log(data);
            })
            .catch(function(error) {
                console.log(error.response.data);
            });
    });
    
}
$(document).ready(function() {
    $("#productItemClean")
        .children("select")
        .select2();

    $("#add").click(function(e) {
        e.preventDefault();
        $myClone = $("#productItemClean").clone();

        $myClone.find("span").remove();
        $myClone.find("select").select2();
        // $($myClone).css('visibility', 'visible');
        // $($myClone).toggleClass("productItemClean")
        $($myClone).removeAttr("id");
        $("productItemClean select").attr("name", "products[]");
        $($myClone).css("visibility", "visible");
        $($myClone).css("height", "25px");
        // $($myClone).css('outline', 'none');
        $("#new-product").append($myClone);
    });
});

</script>
@endsection