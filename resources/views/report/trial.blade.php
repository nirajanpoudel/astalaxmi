@extends('layouts.app')
@section('pageTitle')
<h3 class="page-title">Trial Balance</h3>
@stop
@section('content')
<div class="portlet box green-haze">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-globe"></i>Datatable with TableTools
		</div>
		<div class="tools">
			
		</div>
	</div>
<div class="portlet-body">
		<div class="row">
		<form action="">
			<div class="col-md-5">
				<label for="">From</label>
			<input type="text" class="form-control" name="from">
			</div>
			<div class="col-md-5">
				<label for="">To</label>
			<input type="text" class="form-control" name="td">
			</div>
			<div class="col-md-2">
				<button>Enter</button>
			</div>
			</form>
		</div>
		
			
			
			
		
			<ul class="list-group">
			<?php $grandDebitTotal = 0; ?>
			<?php $grandCreditTotal = 0; ?>
				@foreach($accounts as $account)
					<li class="list-group-item">{{$account->name}}</li>
					
					<table class="table table-responsive table-bordered">
						<tr>
							
							<th width="33%">Name</th>
							<th width="33%">Debit</th>
							<th>Credit</th>
							
						</tr>
						<?php
							$balance = 0;
							
						?>
						@foreach($account->childs as $child)
							@foreach($child->journalTransctions()->rangeDate($range)->get() as $transction)
								<?php 
									$balance = $balance + (int)$transction->debit_amount - (int)$transction->credit_amount;
									if($balance>0){
										$grandDebitTotal += ((int)$transction->debit_amount - (int)$transction->credit_amount);
									}
									if($balance<0){
										$grandCreditTotal += ((int)$transction->debit_amount - (int)$transction->credit_amount);
									} 
									
									// $grandCreditTotal = 0;

								?>

							@endforeach
							<tr>
							
								<td width="33%">{{$child->name}}</td>

								<td width="33%">
									@if($balance>0)
										{{$balance}}
									@endif
								</td>
								<td>@if($balance<0)
										{{$balance}}
									@endif
								</td>
								
							</tr>
							<?php $balance =0; ?>
						@endforeach
					</table>
					
				@endforeach

				<table class="table table-bordered">
					<tr>
						<td width="33%">Total</td>
						<td>{{$grandDebitTotal}}</td>
						<td>{{$grandCreditTotal}}</td>
					</tr>
				</table>
			</ul>
	</div>
</div>
@stop