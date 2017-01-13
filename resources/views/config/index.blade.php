@extends('layouts.app')
@section('content')
<table class="table table-bordered">
	<tr>
		<th>Name</th>
		<th>Value</th>
		<th></th>
	</tr>
	<tr>
		@foreach($configs as $config)
			<tr>
				<td>{{$config->meta_key}}</td>
				<td>{{$config->meta_value}}</td>
				<td>
					<a href="{{url($fiscal_id.'/configs/'.$config->id.'/edit')}}">Edit</a>
				</td>
			</tr>
		@endforeach
	</tr>
</table>
@stop