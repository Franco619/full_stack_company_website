@extends('admin.admin_masters')
@section('admin')

<div class="col-lg-12">
<div class="card card-default">
<div class="card-header card-header-border-bottom">
<h2> Create AboutUs</h2>
</div>
<div class="card-body">
<form method="POST" action="{{ route('store.about') }}" >
@csrf
<div class="form-group">
<label for="exampleFormControlInput1">Slider Title</label>
<input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title">

</div>
<div class="form-group">
<label for="exampleFormControlTextarea1">Slider Description</label>
<textarea class="form-control" name="short_description" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<div class="form-group">
    <label for="exampleFormControlTextarea1">Slider Description</label>
    <textarea class="form-control" name="long_description" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
<div class="form-footer  pt-5 mt-4 border-top">
<button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
</form>
</div>
</div>

</div>





@endsection