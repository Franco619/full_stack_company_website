@extends('admin.admin_masters')
@section('admin')

<div class="py-12">
<div class="container">
<div class="row">
<h4>Home About</h4>
    <a  href="{{ route('add.about') }}"><button class="btn btn-info">Add AboutUs</button></a>
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
<div class="card-header">All AboutUs</div>


<table class="table">
<thead>
<tr>
<th scope="col" width="5%">Sn</th>
<th scope="col" width="15%">Title</th>
<th scope="col" width="25%">Short Descrption</th>
<th scope="col" width="25%">Long Description</th>
<th scope="col" width="15%">Action</th>
</tr>
</thead>
<tbody>
@php
    $i = 1
@endphp
@foreach ( $aboutus as $item)
<tr>
<td scope="row">{{$i++ }}</td>
<td>{{ $item->title }}</td>
<td>{{ $item->short_description }}</td>
<td>{{ $item->long_description }}</td>



<td>
<a href="{{ route('aboutus.edit' , $item->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('aboutus.delete' , $item->id) }}" 
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