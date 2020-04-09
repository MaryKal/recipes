@csrf

@if (Auth::user())

<div class="enter-comment">
<div class="">
    <label for="name"><a href="#">{{auth()->user()->name}}</a></label>
</div>
<div class="form-group">
    <!-- <label for="comment">Enter your comment</label> -->
    <textarea class="" name="comment" id="comment" placeholder="Write your comment"  value="Write your comment"></textarea>
</div>
<div class="add-comments-btn">
<button type="submit" class="">Send</button>
</div>
</div>
@else
<p>Register or login for commenting</p>
@endif