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
       
     


    <div class="card-header">Edit Brand</div>
    
    <div class="card-body">
    <form action="{{ route('update.brand', $brands->id) }} " method="post"
        enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="old_image" value="{{ asset($brands->brand_image) }}">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Update Brand Name</label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
     value="{{ $brands->brand_name }}">
    
    @error('brand_name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Update Brand Image</label>
        <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
         value="{{ $brands->brand_image }}">
        
        @error('brand_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <img src="{{ asset($brands->brand_image) }}" style="width: 200px; height:200px;"><br>
        </div>
    <button type="submit" class="btn bg-primary text-white">Update Brand</button>
    </form>
    </div>
    
    </div>
    </div>    
    
    </div>
    </div>
    </div>
   @endsection
    