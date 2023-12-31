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




<div class="card-header">Edit Contact</div>

<div class="card-body">
<form action="{{ route('contact.update', $contacts->id) }} " method="post">
@csrf


<div class="mb-3">
<label for="exampleInputEmail1" class="form-label"> Update Address</label>
<input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
value="{{$contacts->address }}">

@error('address')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label"> Update Email</label>
<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
value="{{$contacts->email }}">

@error('email')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label"> Update long Description</label>
<input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
    value="{{$contacts->phone }}">

@error('phone')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>



<button type="submit" class="btn bg-primary text-white">Update Contact</button>
</form>
</div>

</div>
</div>    

</div>
</div>
</div>
@endsection
