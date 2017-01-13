<table class="table table-bordered table-responsive">
	<tr>
		<td>Receive Money</td>
		<td>Receive Date</td>
	</tr>
	@foreach($invoice->annotations as $invoice)
		<tr>
			<td>{{$invoice->receive_money}}</td>
			<td>{{$invoice->receive_date}}</td>
		</tr>
	@endforeach
</table>