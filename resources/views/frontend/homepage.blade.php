@extends('frontend.layouts.master')
@section('content')
@section('title','Ana sehife')

<div class="col-md-3" >
  <div class="card">
   @include('frontend.site.category')
</div>
<div class="col-lg-9 col-md-10 mx-auto">
 @foreach($articles as $articl)
  <div class="post-preview" >

      <img  src="{{asset($articl->image)}}">

    <a href="{{route('single',$articl->slug)}}">
      <h2 class="post-title">
      {{$articl->title}}
      </h2>
      <h3 class="post-subtitle">
      {{Str::limit($articl->content,60)}}
      </h3>
    </a>
    <p class="post-meta">Kategoriya:<a href="#"></a> <span class="float-right">{{$articl->created_at->diffForHumans()}}</span></p>
  </div>
  <br>
  @endforeach


  {{$articles->links()}}

</div>
@endsection
