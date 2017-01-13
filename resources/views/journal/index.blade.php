@extends('layouts.app')
@section('styles')
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@stop
@section('content')
	<a href="{{url($fiscal_id.'/journal/create')}}" class="btn btn-success">Create</a>
	
		<table class="table">
			<tr>
				<form action="{{ url($fiscal_id.'/journal') }}" method="get">
					<td></td>
					<td>
						<input type="text" name="date" class="form-control">
					</td>
					<td>
						<input type="text" name="lf" class="form-control">
					</td>
					<td>
						<button class="btn btn-success">Search</button>
					</td>

				</form>
			</tr>
		<tr>
			<th>Description</th>
			<th>Date</th>
			<th>Page</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		@foreach($journals as $journal)
		<tr>
			<td>{{$journal->description}}</td>
			<td>{{$journal->date}}</td>
			<td>{{$journal->lf}}</td>
			<td>
			<button class="btn btn-success" data-toggle="confirmation" class="bs_confirmation_demo_2" data-original-title="" title="">Confirmation 2</button>
				@if($journal->status)
					<a href="{{url($fiscal_id.'/journal/status/'.$journal->id)}}" class="btn btn-success" >verified</a>
				@else 
					<a href="{{url($fiscal_id.'/journal/status/'.$journal->id)}}" class="btn btn-danger">verify</a>
				@endif
			</td>
			<td>
			

			<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Action  <span class="caret"></span>
				  </button>
						<ul class="dropdown-menu">
					    <li><a data-href="{{url($fiscal_id.'/journal/'.$journal->id.'/edit')}}" class="btn-view"  data-toggle="modal" href="#full-width" >Edit</a></li>
					    <li><a href="{{url('vendors/'.$journal->id.'/edit')}}">...</a></li>
					    <li><a href="#">Something else here</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="#">Separated link</a></li>
					  </ul>
					  </div>
			</td>
		</tr>
		@endforeach
	</table>
@stop
@section('scripts')
<script src="{{ asset('assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/pages/scripts/ui-confirmations.js') }}"></script>
<script>
jQuery(document).ready(function() {       
UIConfirmations.init(); // init page demo
});
</script>

	<script>
	

		(function($){
			function addRow(tr_length){
				var tr = '<tr class="added-row">';
				 tr += '<td>';
				tr += '<select class="form-control" name="transctions['+tr_length+'][credit_amount]" id=""><option value="">--Select--</option>						@foreach($accounts as $account)						<optgroup label="{{$account->name}}">							@foreach($account->childs as $child)								<option value="{{$child->id}}">{{$child->name}}</option>							@endforeach							</optgroup>						</optgroup>@endforeach						</select>';
					 tr += '</td>';
					 tr += '<td><input type="text" name="transctions['+tr_length+'][description]" class="form-control"></td>';
					 tr += '<td width="200"><input type="text"  name="transctions['+tr_length+'][debit_amount]" class="form-control"></td>';
					 tr += '<td width="200"><input type="text"  name="transctions['+tr_length+'][credit_amount]" class="form-control"></td>';
				 return tr;
			}

			//added-row
			$(document).on('click','.modal .btn-add',function(){
				var tr_length = $('tbody').find('.added-row').length;
				 $(addRow(tr_length++)).insertAfter($('tbody tr:last'));
				// $('tbody').append(addRow());
			});
		})(jQuery);
	</script>
@stop