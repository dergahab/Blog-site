@extends('backend.layouts.master')
@section('title','Panel')
  @section('content')


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{$articles->count()}} Total blogs</h6>
              <span class="float-right"><a href="{{route('admin.trashed.article')}}" class="btn btn-warning "><i class="fas fa-trash">Softdeleted Articls</i></a></span>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Hit</th>
                      <th>Created at date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($articles as $articl)
                    <tr>
                      <td>
                        <img src="{{asset($articl->image)}}" width="170px">
                      </td>
                      <td>{{$articl->title}}</td>
                      <td>{{$articl->getCategory['name']}}</td>
                      <td>{{$articl->hit}}</td>
                      <td>{{$articl->created_at->diffForHumans()}}</td>
                      <td>
                        <input class="status" data-id="{{$articl->id}}" type="checkbox" data-on="Active" data-onstyle="success" data-offstyle="danger" data-off="Passive" @if($articl->status == 1) checked @endif data-toggle="toggle" data-onstyle="success">
                      </td>
                      <td>
                        <a href="{{route('single',$articl->slug)}}" title="View" class="btn btn-success"> <i class="fas fa-eye"></i></a>
                        <a href="{{route('admin.artikle.edit',$articl->id)}}" title="Edit" class="btn btn-primary"> <i class="fas fa-pen"></i></a>
                        <a  href="{{route('admin.delete.article',$articl->id)}}" title="Delete" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

 $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script></script>
@endsection
