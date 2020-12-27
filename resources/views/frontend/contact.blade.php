@extends('frontend.layouts.master')
@section('title','Contact')
@section('bg','https://media.istockphoto.com/photos/white-chat-bubbles-imprinted-with-contact-us-symbols-on-blue-picture-id925857310?k=6&m=925857310&s=612x612&w=0&h=Z4j6_cC5m2FnG80KTwhMG8YwovRMjpHaIB2iSGrCJSs=')
@section('content')
  

   <div class="col-lg-8 col-md-10 mx-auto">

    @if(session('success'))
      <div class="alert alert-success">
         {{session('success')}}
      </div>
    @endif


  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
        
        <form  method="post" action="{{route('contact.post')}}">
          @csrf
          <div class="control-group">
            <div class="form-group  controls">
              <label>Ad Soyad</label>
              <input type="text" value="{{old('name')}}" class="form-control" placeholder="Ad Soyad" name="name" required >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group  controls">
              <label>Email Address</label>
              <input type="email" value="{{old('email')}}" class="form-control" placeholder="Email Address" name="email" required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12  controls">
              <label>Movzu</label>
              <select class="form-control" name="topic" id="Movzu">
                <option @if(old('topic'))=="Sual" selected  @endif>Sual</option>
                <option @if(old('topic'))=="Siaris" selected  @endif>Sifaris</option>
                <option @if(old('topic'))=="Umumi" selected @endif >Umumi</option>             
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group  controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" name="message">
                 {{old('message')}}             
              </textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>


@endsection

  