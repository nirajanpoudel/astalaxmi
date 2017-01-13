@extends('layouts.app')
@section('content')
	<div class="container">

	<form action="{{url($fiscal_id.'/accounts')}}" method="post">
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name">
		</div>
		<div class="form-group">
			<label for="">Parent</label>
			<select name="parent_id" id="" class="form-control">
			<option value="">--Select--</option>
			@foreach($parents as $account)
				<option value="{{$account->id}}">{{$account->name}}</option>
				@endforeach
			</select>
		</div>
	</form>
	</div>
@stop