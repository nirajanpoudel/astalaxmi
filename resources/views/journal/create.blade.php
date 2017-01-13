@extends('layouts.app')
@section('content')

		<form method="post" action="{{url($fiscal_id.'/journal')}}">
		{!! csrf_field() !!}
			<div class="from-group">
					<div class="row">
						<div class="col-md-6">
							<label for="">Date</label>
					<input type="text" class="form-control" value="{{old('date')}}" name="date">
						</div>
						<div class="col-md-6">
							<label for="">Page</label>
					<input type="text" class="form-control" value="{{old('lf')}}" name="lf">
						</div>
					</div>
					
				</div>
				<div class="from-group">
					<label for="">Description</label>
					<input type="text" value="{{old('description')}}" class="form-control" name="description">
				</div>

			<div class="panel panel-danger" >
					<div class="panel-head">
						Transaction
					</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<td>Account</td>
							<td>Description</td>
							<td>Debit</td>
							<td>Credit</td>
						</tr>
				<tbody>
						@for($i=0; $i<2; $i++)

						<tr class="added-row">
							<td class="select-elment">
								<select class="form-control" name="transctions[{{$i}}][account_id]" id="">
								<option value="">--Select--</option>
								@foreach($accounts as $account)
								<optgroup label="{{$account->name}}">
									@foreach($account->childs as $child)
										<option value="{{$child->id}}">{{$child->name}}</option>
									@endforeach
									</optgroup>
								</optgroup>
									
								@endforeach
								</select>
							</td>
							<td><input type="text" name="transctions[{{$i}}][description]" class="form-control"></td>
							<td width="200"><input type="text" value="" name="transctions[{{$i}}][debit_amount]" class="form-control"></td>
							<td width="200"><input type="text"  name="transctions[{{$i}}][credit_amount]" class="form-control"></td>
						</tr>
						@endfor
				</tbody>
			</table>
			<span class="btn btn-add btn-primary">+</span>
				</div>
			</div>
			
			<div class="form-group">
				<button class="btn btn-success">Create</button>
			</div>
		</form>
@stop
@section('scripts')
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
			$('.btn-add').on('click',function(){
				var tr_length = $('tbody').find('.added-row').length;
				 $(addRow(tr_length++)).insertAfter($('tbody tr:last'));
				// $('tbody').append(addRow());
			});
		})(jQuery);
	</script>
@stop