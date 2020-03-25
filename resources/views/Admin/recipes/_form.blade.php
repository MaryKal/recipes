
<div class="form-group">
    <input type="text" class="form-control " name="name" value="{{$recipe->name}}">
</div>

<textarea class="" name="describe" id="describe">
    {{$recipe->describe}}
</textarea>

<div class="form-group">
    <select class="" name="category_id" id="category_id">
        @foreach ($categories as $item)
        <option value="{{$item->id}}">{{ucfirst(trans($item->name))}}</option>
        @endforeach
    </select>
    @error('category')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-goup div">
    <input type="text" class="form-control " name="slug">
</div>

<div class="form-group">
    {!! Form::label('image_label', 'Choose image:') !!}
    <div class="input-group">
        <input type="text" id="image_label" class="form-control" name="image" aria-label="Image" aria-describedby="button-image" value="{{$recipe->image}}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
        </div>
    </div>
</div>

<button class="btn btn-primary" id="" type="submit">Сохранить</button>



@section('js')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    if (document.querySelector('#describe')) {
        CKEDITOR.replace('describe', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor'
        });
    };

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=900,height=600');
        });
    });

    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }
</script>
@endsection



@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection