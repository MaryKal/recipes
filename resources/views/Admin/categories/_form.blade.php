<div class="form-goup div"> 
    {!! Form::label('name', 'Category name: ') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<br>



<div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control" type="text" name="img">
  </div>
  <img id="holder" style="margin-top:15px;max-height:100px;">
<div class="form-goup div"> 

    {!! Form::label('slug', 'Category slug: ') !!}
    {!! Form::text('slug', null, ['class'=>'form-control']) !!}
</div>



{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}