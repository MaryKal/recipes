@include('layouts.nav-panel')

<a href="/home/">Back</a>
<div class="recipe-describe ">
    <div class="recipe-images">
        <img src="{{asset($recipe->image)}}" alt="" style="width: 200px; height:100px;">
    </div>
    <div class="recipe-items">
        <h2>{{$recipe->name}}</h2>
        <ul>
            <li><i class="far fa-clock"></i>{{$recipe->time}}</li>
            <li>byu</li>
            <li><i class="fas fa-utensils"></i>{{$recipe->persons}}</li>
            <!-- <li>{{$recipe->categories->name}}</li> -->
        </ul>
        <div>
            <p>{{$recipe->describe}}</p>
        </div>
        <div class="author-info ">
            <div class="user-info">
                <div class="author-image">
                    <img src="" alt="">
                </div>
                <div>
                    <h3><a href="/user/{{$recipe->users->id}}">{{$recipe->users->name}}</a></h3>
                    <p>Всего рецептов{{$recipe->users->recipe->count()}}</p>
                </div>
            </div>

            <ul>
                <li>

                    <i class="far fa-heart like" data-id="{{$recipe->id}}">{{$likes}}</i>

                </li>

                <li>item 2</li>
            </ul>
        </div>
    </div>
</div>
<div class="main-info">
    <div class="coocking">
        <h4>Приготовление</h4>
        <div>
            <p style="visibility: hidden; height:0;">{{$count = 1}}</p>
            @foreach($recipe->steps as $step)
            <h4>Шаг {{$count}}</h4>

            <img src="{{asset($step->image)}}" alt="">
            <p>{{$step->step}}</p>
            <p style="visibility: hidden; height:0;">{{$count++}}</p>
         

            @endforeach

        </div>
    </div>
    <div class="ingridients">
        <h3>Ингридиенты</h3>
        <ul>
            @foreach($recipe->products as $product)
            <li>{{$product->name}} - {{$product->pivot->count}} {{$product->pivot->unit}}</li>


            @endforeach
        </ul>
    </div>
</div>
<div class="comments-block">
    <h5>Comments</h5>
    @if (Auth::user())
    <form action="/comments" method="post">
        @include('comments._form')
        <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
        <input type="hidden" name="user_id" value="{{\Auth::user()->id}}">

    </form>
    @else
    <p>Register or login for commenting</p>
    @endif

    @if ($comments)
    @foreach ($recipe->comment as $item)

    <div class="comment">
        <div class="img-div">
            <img src="" alt="">

        </div>
        <div class="comment-text">
            <h5><a href="/user/{{$recipe->users->id}}">{{$item->user->name}}</a></h5>
            <p class="">"{!! $item->comment !!}"</p>
            <div class="reply-link">
                <a href="">Reply</a>
            </div>
        </div>


    </div>

    @endforeach
    @endif
</div>
@include('layouts.footer')