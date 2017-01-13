@extends('layouts.app')
@section('content')
	<form action="{{url($fiscal_id.'/configs/'.$config->id)}}" method="post">
	<input type="hidden" name="_method" value="PATCH">
		{!! csrf_field() !!}
		<div>
			<label for="" class="label-control">Name</label>
			<input type="text" class="form-control"  name="meta_key" value="{{$config->meta_key}}" />
		</div>
		<div>
			<label for="" class="label-control">Value</label>
			<input type="text" class="form-control" name="meta_value" value="{{$config->meta_value}}" />
		</div>
		<div>
			<button class="btn btn-success btn-primary">Submit</button>
		</div>

	</form>
@stop