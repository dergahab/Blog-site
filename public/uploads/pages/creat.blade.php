@extends('backend.layouts.master')
@section('title','Panel')
  @section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
            <div class="card-body">
              <form class="" action="{{route('admin.page.store')}}" method="post" enctype="multipart/form-data">
                @csrf

              <div class="form-group ">
                  <label >Titile</label>
                  <input class="form-control" type="text" name="title" value="{{old('title')}}" required>
              </div>
              <div class="form-group ">
                  <label >Contrnt</label>
                  <textarea name="content" class="form-control" rows="4" cols="60" required>{{old('content')}}</textarea>
              </div>
              <div class="custom-file">
                <input type="file" name='image' class="custom-file-input" id="inputGroupFile01" required>
                <label class="custom-file-label" for="inputGroupFile02">Choose Image</label>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Save</button>
              </div>
              </form>
            </div>
          </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

 $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script></script>
@endsection
