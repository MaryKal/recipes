<table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Describe</th>

        </thead>

        <tbody>
        @foreach ($recipes as $recipe)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><a href="recipes/{{$recipe->id}}">{{$recipe->name}}</a></td>
                <td>{{$recipe->describe}}</td>
                <td>{{$recipe->likes}}</td>

            </tr>
        @endforeach