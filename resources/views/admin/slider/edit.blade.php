@extends('admin.admin_masters')
@section('admin')

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

    
    <div class="py-12">
    <div class="container">
    <div class="row">
    
    
    <div class="col-md-8">
    <div class="card">
       
     


    <div class="card-header">Edit Slider</div>
    
    <div class="card-body">
    <form action="{{ route('update.slider', $sliders->id) }} " method="post"
        enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" value="{{ $sliders->id }}">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Update Slider Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
     value="{{ $sliders->title }}">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Update Slider Description</label>
        <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
         value="{{ $sliders->description }}">
        </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Update slider Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
         value="{{ $sliders->image }}">
        </div>

        <div class="form-group">
            <img src="{{ asset($sliders->image) }}" style="width: 200px; height:200px;"><br>
        </div>
    <button type="submit" class="btn bg-primary text-white">Update Slider</button>
    </form>
    </div>
    
    </div>
    </div>    
    
    </div>
    </div>
    </div>
   @endsection
    