<form action="{{url($fiscal_id.'/invoices/partials/'.$invoice->id)}}" method="post">
{!! csrf_field() !!}
	<div>
		<label for="">Amount</label>
		<input type="text" class="form-control" name="receive_money">
	</div>
	<div>
		<label for="">Date</label>
		<input type="text" class="form-control" name="receive_date">
	</div>
	<div>
		<label for="">Receive/To</label>
		<input type="text" class="form-control" name="receive_by">
	</div>
	<div>
		<button class="btn btn-success">Save</button>
	</div>
</form>