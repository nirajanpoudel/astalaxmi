<form action="{{url($fiscal_id.'/bills/')}}" method="get">
				{!! csrf_field() !!}
					<td>
						<select name="customer_id" id="" class="form-control">
						<option value="">--Search BY Client Name--</option>
							@foreach($customers as $custom)
							<option @if(\Request::get('customer_id')==$custom->id) selected @endif value="{{$custom->id}}">{{$custom->first_name}}</option>
							@endforeach
						</select>
					</td>
					<td>
						<input type="text" value="@if(\Request::get('date')) {{\Request::get('date')}} @endif" name="date" class="form-control">
					</td>
					<td>
						<input type="text" value="@if(\Request::get('bill_number')) {{\Request::get('bill_number')}} @endif" name="bill_number" class="form-control">
					</td>
					<td></td>
					<td></td>
					<td>
						<button>Search</button>
					</td>
				</form>