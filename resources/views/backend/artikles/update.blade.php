@extends('backend.layouts.master')
@section('title','Blog Update')
@section('content')
<div class="card shadow mb-4">
	{!! Toastr::render() !!}
	<div class="card-header py-3">
		<h6 class="m-o font-weight-blod text-primery0">@yield('title')</h6>
	</div>
	<div class="card-body">
		@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</div>
		@endif
		<form method="post" action="{{route('admin.artikle.update',$article->id)}}" enctype="multipart/form-data">
			@method('PUT')
			@csrf
			<div class="form-group">
				<label>Blog Title</label>
				<input type="text" value="{{$article->title}}" name="title" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Blog Category</label>
				<select class="form-control" name="category" >
					@foreach($categories as $category)
					<option @if($article->category_id == $category->id ) selected @endif value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Blog Image</label><br>
				<img src="{{asset($article->image)}}" width="350" class="rounded img-thumbnail">
				<input type="file" name="image" class="form-control" >
			</div>
			
			<div class="form-group">
				<label>Blog Content</label>
				<textarea name="content" class="form-control">
				{{$article->content}}
				</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success float-right">Save</button>
			</div>
		</form>
	</div>
</div>

@endsection


