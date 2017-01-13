<table class="table table-bordered table-responsive">
	<tr>
		<td>Money</td>
		<td>Date</td>
		<td>To</td>
	</tr>
	@foreach($customer->annotations as $invoice)
		<tr>
			<td>{{$invoice->receive_money}}</td>
			<td>{{$invoice->receive_date}}</td>
			<td>{{$invoice->receive_by}}</td>

		</tr>
	@endforeach
</table>