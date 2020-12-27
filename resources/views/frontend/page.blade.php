@extends('frontend.layouts.master')
@section('title',$page->title)
@section('bg',$page->image)
@section('content')




  <!-- Main Content -->
  
      <div class="col-lg-8 col-md-10 mx-auto">
        {!!$page->content!!}
        <br>
        <span class="text-red">Oxunma sayi: <b>{{$page->hit}}</b></span>
      </div>

    
@endsection