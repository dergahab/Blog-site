@extends('frontend.layouts.master')
@section('content')
@section('title','Ana sehife')

<div class="col-md-3" >
  <div class="card">
   @include('frontend.site.category')
</div>
<div class="col-lg-9 col-md-10 mx-auto">
  @if(count($articles)>0)

 @foreach($articles as $articl)
  <div class="post-preview" style="border: 1px solid #FFFFFF;margin:5px;border-radius: 10px;">

      <img class="pull-left mr-1" style="border-radius: 20px" src="{{asset($articl->image)}}">

    <a href="{{route('single',$articl->slug)}}">
      <h2 class="post-title">
      {{$articl->title}}
      </h2>
      <h3 class="post-subtitle">
      {{Str::limit($articl->content,60)}}
      </h3>
    </a>
    <p class="post-meta">Kategoriya:<a href="#">{{$articl->getCategory->name}}</a> <span class="float-right">{{$articl->created_at->diffForHumans()}}</span></p>
  </div>
  @endforeach
  <hr>
  @else
    <div class="alert alert-danger">
      <h3>Bu kateqoriyaya aid yazi movcud deyil</h3>
    </div>
  @endif

  {{$articles->links()}}
</div>
@endsection
