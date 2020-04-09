<div class="form-goup div">
  {!! Form::label('name', 'Category name: ') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<br>

<div class="form-group">
  {!! Form::label('image_label', 'Choose image:') !!}
  <div class="input-group">
    <input type="text" id="image_label" class="form-control" name="image" aria-label="Image" aria-describedby="button-image" value="{{$category->img}}">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
    </div>
  </div>
</div>

{!! Form::label('slug', 'Category slug: ') !!}
{!! Form::text('slug', null, ['class'=>'form-control']) !!}

@if ($category->img)
   <div class="form-group">
        <label for="">Image</label>

        <img src="{{$category->img}}" alt="" class="thumbnail admin-edit-image" style="width:100px; height:100px;">
        <a href="#" class="remove-img"> Remove</a>
        <input type="hidden" name="removeImg">
        @error('img')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div> 
@endif



{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

@section('js')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script> 
    const removeImg = document.querySelector('.remove-img');
    // console.log(removeImg);
        if(removeImg){
            removeImg.addEventListener('click',
            function(e){
                e.preventDefault();
                document.querySelector('.thumbnail').remove();
                this.remove();
        document.querySelector('[name="removeImg"]').value = 'remove';
})
}
</script>
<script>
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