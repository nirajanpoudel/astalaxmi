
	

		<form method="post" action="{{url($fiscal_id.'/journal/'.$journal->id)}}">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="PATCH">
			<div class="from-group">
				<label for="">Description</label>
				<input type="text" value="{{$journal->description}}" class="form-control" name="description">
			</div>
			<div class="from-group">
				<label for="">Date</label>
				<input type="text" class="form-control" value="{{$journal->date}}" name="date">
			</div>
			<div class="panel panel-danger" >
				<div class="panel-head">
					Transaction
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-responsive">
						<tr>
							<td>Account</td>
							<td>Description</td>
							<td>Debit</td>
							<td>Credit</td>
						</tr>
					<tbody >
				@foreach($journal->journalTransactions as $i=>$t)
						
						<tr class="added-row">
							<td>
								<select class="form-control" name="transctions[{{$i}}][account_id]" id="">
								<option value="">--Select--</option>
								@foreach($accounts as $account)
								<optgroup label="{{$account->name}}">
									@foreach($account->childs as $child)
										<option @if($child->id==$t->account_id) selected @endif value="{{$child->id}}">{{$child->name}}</option>
									@endforeach
									</optgroup>
								</optgroup>
								@endforeach
								</select>
							</td>
							
							<td><input type="text" name="transctions[{{$i}}][description]" class="form-control" value="{{$t->description}}"></td>
									<td width="200"><input type="text" value="{{$t->debit_amount}}" name="transctions[{{$i}}][debit_amount]" class="form-control"></td>
									<td width="200"><input type="text"  name="transctions[{{$i}}][credit_amount]" value="{{$t->credit_amount}}" class="form-control"></td>
						</tr>
						@endforeach
						
					</tbody>
			</table>
			<span class="btn btn-add btn-primary">+</span>
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" name='submit' value="Edit" class="btn btn-success">
			</div>
		</form>