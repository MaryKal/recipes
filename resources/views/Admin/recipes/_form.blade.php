<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="form-group">
    <input type="text" class="form-control " name="name" value="{{$recipe->name}}">
</div>

<div class="form-group">
    <textarea class="" name="describe" id="describe">
    {{$recipe->describe}}
    </textarea>
</div>

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


<div class="input-group">
    <input type="text" id="image_label" class="form-control" name="image" aria-label="Image" aria-describedby="button-image">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
    </div>
</div>




<button class="btn btn-primary">Сохранить</button>
@endsection

@section('js')
<!-- <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script> -->
<script>
    CKEDITOR.replace('editor-id', {
        filebrowserImageBrowseUrl: '/file-manager/ckeditor'
    });
</script>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: '#describe',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern',
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                tinyMCE.activeEditor.windowManager.open({
                    file: '/file-manager/tinymce',
                    title: 'Laravel File Manager',
                    width: window.innerWidth * 0.9,
                    height: window.innerHeight * 0.9,
                    resizable: 'yes',
                    close_previous: 'no',
                }, {
                    setUrl: function(url) {
                        win.document.getElementById(field_name).value = url;
                    },
                });
            },
        });
    });





    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });

    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }
</script>

@endsection