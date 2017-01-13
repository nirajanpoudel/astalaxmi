@extends('layouts.app')
@section('styles')
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@stop
@section('content')
<a href="{{url($fiscal_id.'/customers/create')}}" class="btn btn-success">Add New</a>
	<table class="table table-responsive table-border">
		<tr>
			<td>Sn</td>
			<td>Name</td>
			<td>Phone</td>
			<td>Total Amount </td>
				<td>Paid Amount/</td>
			<td></td>
		</tr>
		@foreach($customers as $i=>$customer)
			<tr>
			<td>{{$i}}</td>
				<td>
				{{$customer->first_name}}</td>
				<td>{{$customer->phone}}</td>
				<td>
					<?php $i=0; ?>
					@foreach($customer->bills as $bill)
					<?php 	$i += $bill->total ?>
					@endforeach
						{{$i}}
					</td>
					<td>
						<?php $a=0; ?>
						@foreach($customer->annotations as $annotation)
						<?php $a += $annotation->receive_money ?>
						@endforeach
						{{$a}}
						
					</td>
				<td>
					<!-- Single button -->
				<div class="btn-group">
				  <button type="button" class="btn btn-xs blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Action <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">

				    <li><a href="{{url($fiscal_id.'/bills?customer_id='.$customer->id)}}">Transaction Detail</a></li>
				    <li><a href="{{url($fiscal_id.'/customers/'.$customer->id.'/edit')}}">Edit</a></li>
				   
				    <li role="separator" class="divider"></li>
				     <li><a href="{{url($fiscal_id.'/bills/create?customer_id='.$customer->id)}}">Create Bill</a></li>
				      <li><a data-toggle="modal" href="#responsive" class="btn-view" data-href="{{url($fiscal_id.'/customers/'.$customer->id.'/payment')}}">Make Payment</a></li>
					    <li><a data-toggle="modal" href="#responsive" class="btn-view" data-href="{{url($fiscal_id.'/customers/'.$customer->id.'/detail')}}">Detail</a></li>
				  </ul>
				</div>
				</td>
			</tr>
		@endforeach

	</table>

	
@stop