@include('layouts.nav-panel')


<div class="add-rec">
<h1>Создайте свой рецепт</h1>



<form action="/recipes" method="POST" enctype="multipart/form-data" name="recipe">
        @csrf
        @include('recipes._form')
</form>
</div>
@include('layouts.footer')
