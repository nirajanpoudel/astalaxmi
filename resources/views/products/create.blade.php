	@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{url($fiscal_id.'/products')}}" method="post">
	{!! csrf_field() !!}
		<div class="form-group">
			<label for="">Name</label>
			<input type="text"  class="form-control" name="title">
		</div>
		<div class="form-group">
			<label for="">Price</label>
			<input type="text"  class="form-control" name="price">
		</div>
		<div class="form-group">
			<label for="">Qtn</label>
			<input type="text"  class="form-control" name="qtn">
		</div>
		
		
		<div class="form-group">
			<button class="btn btn-primary">Create</button>
		</div>
	</form>
</div>
	
@stop