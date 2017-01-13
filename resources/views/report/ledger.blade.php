<h2>Leger Book of {{$account->name}}</h2>
		<a href="{{URL::previous()}}" class="btn btn-success">Back</a>
		<a data-href="" class="btn default btn-view-filter" data-target="#stack1" data-toggle="modal">Filter</a>

	<form action="">
		<input type="text" class="form-control" name="form">
		<input type="text" class="form-control" name="to">
		<button class="btn blue btn-search">Search</button>
	</form>

	@if($transctions->count())
		<table class="table table-responsive">
			<tr>
				<th>Date</th>
				<th>Description</th>
				<th>Ref</th>
				<th>Debit</th>
				<th>Credit</th>
				<th>Balance</th>
			</tr>
			<?php
				$balance = 0;
			?>
			
			@foreach($transctions as $transction)

				<tr>
				
					<td>{{$transction->date}}</td>
					<td>{{$transction->description}}</td>
					<td>...</td>
					<td>{{$transction->debit_amount}}</td>
					<td>{{$transction->credit_amount}}</td>
					<td><?php echo $balance =   ($balance + (int)$transction->debit_amount - (int)$transction->credit_amount)  ?></td>
				</tr>
			@endforeach
			
		</table>
		@else
				not transactions Yet!!!!!!
			@endif
	