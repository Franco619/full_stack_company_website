@extends('admin.admin_masters')
@section('admin')

<div class="col-lg-12">
<div class="card card-default">
<div class="card-header card-header-border-bottom">
<h2> Add Contact</h2>
</div>
<div class="card-body">
<form method="POST" action="{{ route('store.contact') }}" >
@csrf
<div class="form-group">
<label for="exampleFormControlInput1">Address</label>
<input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Enter Address">

</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Address">
    
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Phone</label>
        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Enter Address">
        
        </div>

<div class="form-footer  pt-5 mt-4 border-top">
<button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
</form>
</div>
</div>

</div>





@endsection