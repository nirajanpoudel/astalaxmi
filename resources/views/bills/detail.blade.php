<table class="table table-bordered table-responsive">
	<tr>
		<td>Receive Money</td>
		<td>Receive Date</td>
		<td>Receive Date</td>
	</tr>
	@foreach($bill->annotations as $bill)
		<tr>
			<td>{{$bill->receive_money}}</td>
			<td>{{$bill->receive_date}}</td>
			<td>{{$bill->receive_by}}</td>
		</tr>
	@endforeach
</table>