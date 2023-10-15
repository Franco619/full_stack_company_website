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
       
     


    <div class="card-header">Edit About</div>
    
    <div class="card-body">
    <form action="{{ route('aboutus.update', $abouts->id) }} " method="post">
    @csrf

    
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Update About Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
     value="{{$abouts->title }}">
    
    @error('title')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Update Short Description</label>
        <input type="text" name="short_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
         value="{{ $abouts->short_description }}">
        
        @error('short_description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> Update long Description</label>
            <input type="text" name="long_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             value="{{ $abouts->long_description }}">
            
            @error('long_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
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
    