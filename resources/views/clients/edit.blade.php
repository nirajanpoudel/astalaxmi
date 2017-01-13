@extends('layouts.app')
@section('content')
<div class="container">
	<form method="post" action="{{url($fiscal_id.'/customers/'.$customer->id)}}">
	{!! csrf_field() !!}
	<input type="hidden" name="_method" value="PATCH">
		<div class="form-group">
			<label for="">Name</label>
			<input type="text"  class="form-control" value="{{$customer->first_name}}" name="first_name">
		</div>
		<div class="form-group">
			<label for="">Last Name</label>
			<input type="text"  class="form-control" value="{{$customer->last_name}}" name="last_name">
		</div>
		<div class="form-group">
			<label for="">Phone</label>
			<input type="text" value="{{$customer->phone}}" class="form-control" name="phone">
		</div>
		<div class="form-group">
			<label for="">Mobile</label>
			<input type="text"  class="form-control" value="{{$customer->mobile}}" name="mobile">
		</div>
		<div class="form-group">
			<label for="">Address</label>
			<input type="text" value="{{$customer->address}}" class="form-control" name="address">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Update</button>
		</div>
	</form>
</div>
	
@stop