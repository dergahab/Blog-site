@extends('backend.layouts.master')
@section('title','Category')
@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="card mb-4">
			<div class="card-header">
				New Category

			</div>
			<div class="card-body">
				<form action="{{route('admin.category.create')}}" method="post">
					@csrf
					<div class="form-group">
						<label> Category name</label>
						<input type="text" name="category" class="form-control" required>
					</div>
					<div class="form-group">
						<button class="btn btn-success btn-block">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card mb-">
			<div class="card-header">
				Categories
			</div>
			<div class="card-body">

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>


								<th>Category</th>
								<th>Article count</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($categories as $category)
							<tr>

								<td>{{$category->name}}</td>

								<td>{{$category->articlecount()}}</td>

								<td>
									<div class="custom-control custom-switch">

									</div>
								</td>
								<td>
									<a category-id="{{$category->id}}" class="btn btn-primary btn-sm edit" ><i class="fas fa-edit text-white"></i></a>
									<a category-id="{{$category->id}}" category-count="{{$category->articlecount()}}" class="btn btn-danger btn-sm sil" ><i class="fas fa-trash text-white"></i></a>
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit category</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form method="post" action="{{route('admin.category.update')}}">
				@csrf
				<div class="modal-body">

					<div class="form-group">
						<labe>Category  name</labe>
						<input id="category" type="text" name="category" class="form-control">
						<input type="hidden" name="id" id="category_id">
					</div>

					<div class="form-group">
						<button class="btn btn-primar "></button>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" >Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal" id="deleteModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete category</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

				<div id="m-body" class="modal-body">
					<div class="alert alert-danger" id="deleteAlert">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<form class="" action="{{route('admin.category.delete')}}" method="post">
						@csrf
						<input type="hidden" name="id" id="deleteId">
						<button id="deleteBtn" type="submit" class="btn btn-primary" >Delete</button>

				</div>
			</form>
		</div>
	</div>
</div>
@section('js')
<!-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
-->@endsection

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script type="text/javascript">

$(function() {
	//edit
	$('.edit').click(function(){
		id = $(this)[0].getAttribute('category-id');
		$.ajax({
	type:'GET',
	url:"{{route('admin.category.getData')}}",
	data:{id:id},
	success:function(data){
		console.log(data);
		$('#category').val(data.name);

		$('#category_id').val(data.id);
		$('#myModal').modal('show');
	}
});
	});
// sil
$('.sil').click(function(){
	id = $(this)[0].getAttribute('category-id');
	count = $(this)[0].getAttribute('category-count');
$('#m-body').hide();
	if(id==1){
		$('#deleteAlert').html(' Bu kategoriyani silmek olmaz.Bu kateqoriyasi movcud olmayan veye silinen bloglarin kategoriyasi kimi qeyd elilir ');
		$('#m-body').show();
		$('#deleteBtn').hide();
		$('#deleteModal').modal('show');
		return;
	}

	$('#deleteId').val(id);

	$('#deleteAlert').html('');
	if(count>0){
		$('#deleteAlert').html(' Bu categoriyay aid '+count+' meqale var. Silmek isdediyinizden eminsiz? ');
		$('#m-body').show();
		$('#deleteBtn').show();
	}
		$('#deleteModal').modal('show');
	});

	//status
$('.status').change(function() {
id = $(this)[0].getAttribute('category-id');
status = $(this).prop('checked');
$.get("{{route('admin.category.switch')}}",{id:id,status:status},function(data,status){});
})
})
</script>
@endsection
