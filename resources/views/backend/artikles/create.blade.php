@extends('backend.layouts.master')
@section('title','Blog create')
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
		<form method="post" action="{{route('admin.artikle.store')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Blog Title</label>
				<input type="text" value="{{old('title')}}" name="title" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Blog Category</label>
				<select class="form-control" name="category" >
					@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Blog Title</label>
				<input type="file" name="image" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label>Blog Content</label>
				<textarea name="content" class="form-control">
				{{old('content')}}
				</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success float-right">Save</button>
			</div>
		</form>
	</div>
</div>

@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
	$(document).ready(function() {
$('#editor').summernote();
});
</script>
@endsection