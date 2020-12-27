@extends('frontend.layouts.master')
@section('content')
@section('title',$article->title)
@section('bg',asset('storage/image/').'/'.$article->second_img)

  
   
      <div class=" col-md-9 mx-auto ">
        <p>{{$article->content}}</p>
      </div>
      <hr>
      	
        <div class="card" style="border-color: #FFFFFF">
      @include('frontend.site.category')
    </div>
  


@endsection