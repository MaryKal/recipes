@include('layouts.nav-panel')

<a href="/home/">Back</a>
<div class="recipe-describe flex-items">
    <div class="recipe-images">
    <img src="{{$recipe->image}}" alt="" style="width: 200px; height:100px;">
    </div>
    <div class="recipe-items">
        <h4>{{$recipe->name}}</h4>
        <ul>
            <li>Сложность</li>
            <li>Время</li>
            <li>{{$recipe->categories->name}}</li>
        </ul>
        <div class="author-info">
            <div class="flex-items">
                <div class="author-image">
                    <img src="" alt="">
                </div>
                <div class="flex-items">
                    <div>                 
                    
                       <h3><a href="/user/{{$recipe->users->id}}">{{$recipe->users->name}}</a></h3>
                       <p>{{$rec}}</p>
                    </div>
                    <div>
                        <ul>
                            <li>item 1</li>
                            <li>item 2</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ingridient-ul">
            <h3>Ингридиенты</h3>
            <div>
        <ul>
            <li>Lorem.</li>
            <li>Lorem.</li>
            <li>Lorem.</li>
            <li>Lorem.</li>
            
        </ul>
        </div>
        <div>
        <ul>
                <li>Lorem.</li>
                <li>Lorem.</li>
                <li>Lorem.</li>
                <li>Lorem.</li>
        </ul>
        </div>
        </div>
    </div>
</div>
<div>
    <h4>Приготовление</h4>
    <div>
        <h4>Шаг 1</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, officiis.</p>
    </div>
</div>






@include('layouts.footer')