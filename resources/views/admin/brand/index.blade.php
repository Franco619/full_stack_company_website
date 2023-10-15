@extends('admin.admin_masters')
@section('admin')

<div class="py-12">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="card">

<div class="card-header">All Brand</div>


<table class="table">
<thead>
<tr>
<th scope="col">Sn</th>
<th scope="col">Brand Name</th>
<th scope="col">Brand Image</th>
<th scope="col">Created at</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

@foreach ( $brands as $item)
<tr>
<th scope="row">{{$brands->firstItem() + $loop->index  }}</th>
<td>{{ $item->brand_name }}</td>
<td><img src="{{ asset($item->brand_image) }}" style="height: 40px; width:70px"></td>

@if ($item->created_at == Null)
<span class="text-danger">No Data Set</span> 

@else
<td>{{ $item->created_at->diffForHumans() }}</td>
@endif

<td>
<a href="{{ route('brand.edit' , $item->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('brand.delete' , $item->id) }}" 
    onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
</td>
</tr>
@endforeach




</tbody>
</table>
{{ $brands->links() }}
</div>
</div>

<div class="col-md-4">
<div class="card">
<div class="card-header">Add Brand</div>

<div class="card-body">
<form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Brand Name</label>
<input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

@error('brand_name')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    @error('brand_image')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

<button type="submit" class="btn bg-primary text-white">Add Brand</button>
</form>
</div>

</div>
</div>    

</div>
</div>



</div>

@endsection