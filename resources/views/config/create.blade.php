@extends('layouts.app')
@section('content')
	<form action="{{url($fiscal_id.'/configs')}}" method="post">
		{!! csrf_field() !!}
		<div>
			<label for="" class="label-control">Name</label>
			<input type="text" class="form-control"  name="meta_key" value="" />
		</div>
		<div>
			<label for="" class="label-control">Value</label>
			<input type="text" class="form-control" name="meta_value" value="" />
		</div>
		<div>
			<button>Submit</button>
		</div>

	</form>
@stop