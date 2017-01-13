@extends('layouts.app')
@section('styles')
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@stop
@section('styles')
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@stop
@section('content')
<div class="container">
<a href="{{url($fiscal_id.'/products/create')}}" class="btn btn-success">Add New</a>
	<table class="table table-responsive">
		<tr>
			<td>Name</td>
			<td>Phone</td>
			<td>stock</td>
			<td></td>
		</tr>
		@foreach($products as $product)
			<tr>
				<td>
				{{$product->title}}</td>
				<td>{{$product->price}}</td>
				<td>{{$product->qtn}}</td>
				<td>
					<!-- Single button -->
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Action <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
				   
				    <li><a data-href="{{url($fiscal_id.'/products/'.$product->id.'/edit')}}" class="btn-view" data-toggle="modal" href="#responsive">Edit</a></li>
				   
				    <li role="separator" class="divider"></li>
				     <li><a href="{{url($fiscal_id.'/bills/create?product_id='.$product->id)}}">Create Bill</a></li>
				  </ul>
				</div>
				</td>
			</tr>
		@endforeach

	</table>
</div>
	
@stop
