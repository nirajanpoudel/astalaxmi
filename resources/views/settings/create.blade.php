@extends('layouts.fiscal')
@section('content')
<form action="{{url('fiscal-year')}}" method="post">
{!! csrf_field() !!}
	<div>
		<label for="">Fiscal  Start</label>
		<input class="form-control" type="text" name="fiscal_year_start">
	</div>
	<div>
		<label for="">Fiscal end</label>
		<input class="form-control" type="text" name="fiscal_year_end">
	</div>
	<div>
		<label for="">Opening Balance</label>
		<input class="form-control" type="text" name="opening_balance">
	</div>
	
	<div>
		<button class="btn btn-success">Save</button>
		<a href="{{url('/')}}" class="btn btn-success">Back</a>
	</div>
</form>
@stop