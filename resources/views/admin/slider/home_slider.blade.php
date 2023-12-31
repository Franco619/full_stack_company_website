@extends('admin.admin_masters')
@section('admin')

<div class="py-12">
<div class="container">
<div class="row">
<h4>Home Slider</h4>
    <a  href="{{ route('add.slider') }}"><button class="btn btn-info">Add Slider</button></a>
<div class="col-md-12">
<div class="card">
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>{{ session('success') }}</strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<div class="card-header">All Slider</div>


<table class="table">
<thead>
<tr>
<th scope="col" width="5%">Sn</th>
<th scope="col" width="15%">Title</th>
<th scope="col" width="25%">Descrption</th>
<th scope="col" width="15%">Image</th>
<th scope="col" width="20%">Action</th>
</tr>
</thead>
<tbody>
@php
    $i = 1
@endphp
@foreach ( $sliders as $item)
<tr>
<td scope="row">{{$i++ }}</td>
<td>{{ $item->title }}</td>
<td>{{ $item->description }}</td>
<td><img src="{{ asset($item->image) }}" style="height: 40px; width:70px"></td>



<td>
<a href="{{ route('slider.edit' , $item->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('slider.delete' , $item->id) }}" 
onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
</td>
</tr>
@endforeach




</tbody>
</table>
</div>
</div> 

</div>
</div>



</div>

@endsection