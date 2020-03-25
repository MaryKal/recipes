@csrf

    <div class="form-group">
        <label for="comment">Text comments</label>
    <textarea
        class="form-control @error('content') is-invalid @enderror"
        name="comment"
        id="comment"
        placeholder="Write your comment"
        value="Write your comment">
    </textarea>
        @error('comment')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-inline">
        <div class="form-group col-8">
            <label for="name">Your name</label>
        <input type="text" class="col-md-4 form-control ml-2 @error('title') is-invalid @enderror" name="name" id="name" placeholder="Your name" value="">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <button type="submit" class="btn btn-secondary  col-4">{{$news->id ? 'Add comment':'Save changes'}}</button>
    </div>