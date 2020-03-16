<table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th></th>

        </thead>

        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><a href="categories/{{$category->id}}">{{$category->name}}</a></td>

            </tr>
        @endforeach