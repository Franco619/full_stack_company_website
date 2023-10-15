@extends('admin.admin_masters')
@section('admin')

<div class="card card-default">
<div class="card-header card-header-border-bottom">
<h2>User Profile</h2>

</div>
<div class="card-body">
<form class="form-pill" method="POST" action="{{ route('store.profile') }}"
enctype="multipart/form-data">
    @csrf
<div class="form-group">
<label for="exampleFormControlInput3">User Name</label></label>
<input type="text" class="form-control" name="name" placeholder="Password"
value="{{ $user->name }}">

</div>
<div class="form-group">
<label for="exampleFormControlPassword3">User Email</label>
<input type="email" class="form-control" name="email" 
value="{{ $user->email }}">

</div>

<div class="form-group">
    <label for="exampleFormControlPassword3">User Photo</label>
    
    <input name="profile_photo_path" class="form-control" type="file"  id="profile_photo_path">
    <img class="rounded-circle header-profile-user" src="{{ (!empty($user->profile_photo_path))? url('upload/admin_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}  " width="100px" height="100px" >
    </div>



    <button type="submit" class="btn btn-primary btn-default">Update</button>
</form>
</div>
</div>



@endsection