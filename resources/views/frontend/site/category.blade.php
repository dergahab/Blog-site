
@isset($categories)
   <dic class="card-header">
        Kategoriyalar
      </dic>
       <div class="list-group">
    @foreach($categories as $category)
    <a  href="{{route('category',$category->slug)}}" class="list-group-item list-group-item-action @if(Request::segment(2)==$category->slug)  active @endif">
     {{$category->name}} <span class="badge bg-success float-right">{{$category->articlecount()}}</span>
    </a>
  @endforeach
  </div>
    </div>

@endif