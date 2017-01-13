	@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{url($fiscal_id.'/customers')}}" method="post">
	{!! csrf_field() !!}
		<div class="form-group">
			<label for="">Name</label>
			<input type="text"  class="form-control" name="first_name">
		</div>
		<div class="form-group">
			<label for="">Last Name</label>
			<input type="text"  class="form-control" name="last_name">
		</div>
		<div class="form-group">
			<label for="">Phone</label>
			<input type="text"  class="form-control" name="phone">
		</div>
		<div class="form-group">
			<label for="">Mobile</label>
			<input type="text"  class="form-control" name="mobile">
		</div>
		<div class="form-group">
			<label for="">Address</label>
			<input type="text"  class="form-control" name="address">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Create</button>
		</div>
	</form>
</div>
	
@stop