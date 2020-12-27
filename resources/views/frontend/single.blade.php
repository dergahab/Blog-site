@extends('frontend.layouts.master')
@section('content')
@section('title',$page->title)
@section('bg',asset($page->image))



  <!-- Main Content -->
  
      <div class="col-lg-8 col-md-10 mx-auto">
        {!!$page->content!!}
        <br>
        <span class="text-red">Oxunma sayi: <b>{{$page->hit}}</b></span>
      </div>

    
@endsection