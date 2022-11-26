@extends('admin.layout.master')

@push('plugin-styles')

@endpush

@section('content')

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
    @if($errors->any())

{!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}

@endif
      <div class="card-body">
        <h2 class="text-center mb-4">Create Course</h2>

        
        <div class="auto-form-wrapper col-md-10 row">
      
      
        <div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <h2 class="text-center mb-4">Register</h2>
      <div class="auto-form-wrapper">
        <form action="#">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Username">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="password" class="form-control" placeholder="Confirm Password">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> I agree to the terms </label>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Register</button>
          </div>
          <div class="text-block text-center my-3">
            <span class="text-small font-weight-semibold">Already have and account ?</span>
            <a href="{{ url('/user-pages/login') }}" class="text-black text-small">Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
        <form action="{{route('createcourse')}}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group col-md-6">
              
            <label>Title:</label>

              <div class="input-group">
                <input type="text" class="form-control" placeholder="Course Title" name="title" id="title">

              </div>
            </div>
            
            <div class="form-group col-md-6">
              <label>Image:</label>
              <div class="input-group">
                <input type="file" class="form-control" placeholder="Image" name="image" id="image" style="border:none">

              </div>
            </div>

            <div class="form-group col-md-4">
              <label>Description:</label>
              <div class="input-group">
                <textarea id="txtarea" class="tinymce-editor" name="description"></textarea>

              </div>
            </div>

            <div class="form-group col-md-4">
              <label>Status:</label>
              <div class="input-group">
                <select name="status" class="form-control">
                  <option value="0">--Select Status--</option>

                  <option value="1">Yes</option>
                  <option value="2">No</option>

                </select>
              </div>
            </div>


            <div class="form-group col-md-2">
              <button class="btn btn-primary submit-btn btn-block">Save</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection