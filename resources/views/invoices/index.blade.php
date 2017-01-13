@extends('layouts.app')
@section('styles')
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@stop
@section('content')
    
        <div class="col-xs-12">
        <a href="{{url($fiscal_id.'/invoices/create')}}" class="btn btn-success">Create</a>
			<table class="table table-responsive table-bordered table-condensed">
				<tr class="danger">
					<th>Client</th>
					<th>Date</th>
					<th>Invoice No.</th>
					<th>Total</th>
					
					<th>Action</th>
				</tr>
				@foreach($invoices as $invoice)
				<tr>
					
					<td>{{$invoice->vendor->first_name}}</td>
					<td>{{$invoice->date}}</td>
					<td>{{$invoice->invoice_number}}</td>
					<td>{{$invoice->total}}</td>
					
					<td>
						
						<div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" class="btn-sx" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    Dropdown
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						 
				
						    
						    
						    <li>
						    	<a data-toggle="modal" href="#full-width" class="btn-view" data-href="{{url($fiscal_id.'/invoices/'.$invoice->id)}}">View</a>
						    </li>
						     <li><a href="{{url($fiscal_id.'/invoices/'.$invoice->id.'/edit')}}" class="btn-view">Edit</a></li>
							
						  </ul>
						</div>
					</td>
				</tr>
				@endforeach
			</table>
        </div>

@stop
@section('script')
			
@stop