@extends('backend.layouts.master')
@section('title','Panel')
  @section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
              <a href="{{route('admin.page.create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Insert</a>
            </div>
            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>Order</td>
                        <td>Title</td>
                        <td>Image</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                  </thead>

                  <tbody id="orderby">
                    @foreach($pages as $page )

                      <tr id="page_{{$page->id}}">
                        <td><i class="fas fa-sort fa-3x handle" style="cursor:move"> </i></td>
                        <td>{{$page->title}}</td>
                        <td> <img src="{{$page->image}}" style="width:150px" alt=""></td>
                        <td>{{$page->status}}</td>
                        <td>

                          <form class="" action="{{URL::route('admin.page.destroy',$page->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                              <button type="submit"  class="btn btn-danger" atr="sil"><i class="fas fa-trash"></i></button>
                          </form>
                          <a href="{{URL::route('admin.page.edit',$page->id)}}"  class="btn btn-primary"><i class="fas fa-pen"></i></a>
                         </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>



<script>
$('#orderby').sortable({
  handle:'.handle',
  update:function(event, ui){
      var data = $(this).sortable('serialize');
      console.log(data);
  }
});

</script>


@endsection
