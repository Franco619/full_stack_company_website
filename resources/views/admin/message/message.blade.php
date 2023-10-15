@extends('admin.admin_masters')
@section('admin')

<div class="py-12">
<div class="container">
<div class="row">
<h4>Messages</h4>
<div class="col-md-12">
<div class="card">

<div class="card-header">All Messages</div>


<table class="table">
<thead>
<tr>
<th scope="col" width="5%">Sn</th>
<th scope="col" width="15%">name</th>
<th scope="col" width="15%">email</th>
<th scope="col" width="25%">Subject</th>
<th scope="col" width="25%">Message</th>
<th scope="col" width="25%">Created_at</th>
<th scope="col" width="15%">Action</th>
</tr>
</thead>
<tbody>
@php
    $i = 1
@endphp
@foreach ( $messages as $item)
<tr>
<td scope="row">{{$i++ }}</td>
<td>{{ $item->name }}</td>
<td>{{ $item->email }}</td>
<td>{{ $item->subject }}</td>
<td>{{ $item->message }}</td>
<td>{{ $item->created_at }}</td>



<td>
<a href=" {{ route('message.deleted',$item->id)}}" 
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