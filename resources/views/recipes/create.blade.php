@include('layouts.nav-panel')


<h1>Создайте свой рецепт</h1>

<form action="/recipes" method="POST" enctype="multipart/form-data">
        @csrf
        @include('recipes._form')
</form>
