@extends('backend.layouts.master')
@section('title','Config')
  @section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>

            <div class="card-body">

                  <form class="" action="{{route('admin.config.update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Website name</label>
                          <input type="text" name="title" value="{{$config->title}}" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Website status</label>
                          <select class="form-control" name="active">
                              <option  @if($config->active==1) selected @endif value="1">Active</option>
                              <option @if($config->active==0) selected @endif value="0">Passiv</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Website Logo</label>
                          <input type="file" name="logo"  class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Website favicon</label>
                          <input type="file" name="favicon"  class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Facbook</label>
                          <input type="text" name="facebook"  value="{{$config->facebook}}" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Instagram</label>
                          <input type="text" name="instagram"  value="{{$config->instagram}}" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Medium</label>
                          <input type="text" name="medium"  value="{{$config->medium}}"  class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">

                          <button type="submit" class="btn btn-success float-right" name="update">Update</button>
                        </div>
                      </div>


                    </div>
                  </form>

            </div>
          </div>



@endsection
