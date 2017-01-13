@extends('layouts.app')
@section('styles')
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@stop
@section('content')

		<a href="{{url($fiscal_id.'/vendors/create')}}">Add New</a>
		<table class="table table-responsive">
			<tr>
				<td>Name</td>
				<td>Phone</td>
				<td>Total Amount </td>
				<td>Paid Amount/</td>
				<td>Action</td>
			</tr>
			@foreach($vendors as $vendor)
				<tr>
					<td>{{$vendor->first_name}}</td>
					<td>{{$vendor->phone}}</td>
					<td>
					<?php $i=0; ?>
					@foreach($vendor->invoices as $invoice)
					<?php 	$i += $invoice->total ?>
					@endforeach
						{{$i}}
					</td>
					<td>
						<?php $a=0; ?>
						@foreach($vendor->annotations as $annotation)
						<?php $a += $annotation->receive_money ?>
						@endforeach
						{{$a}}
						
					</td>
					<td>
					<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Action <span class="caret"></span>
				  </button>
						<ul class="dropdown-menu">
					    <li><a href="{{url($fiscal_id.'/invoices/?vendor_id='.$vendor->id)}}">Transaction Detail</a></li>
					    <li><a href="{{url($fiscal_id.'/vendors/'.$vendor->id.'/edit')}}">Edit</a></li>
					   
					    <li role="separator" class="divider"></li>
					    <li><a data-toggle="modal" href="#responsive" class="btn-view" data-href="{{url($fiscal_id.'/vendors/'.$vendor->id.'/payment')}}">Make Payment</a></li>
					    <li><a data-toggle="modal" href="#responsive" class="btn-view" data-href="{{url($fiscal_id.'/vendors/'.$vendor->id.'/detail')}}">Detail</a></li>
					  </ul>
					  </div>
					</td>
				</tr>
			@endforeach
		</table>
@stop