@extends('layouts.app')
@section('content')
	<div class="container">
		<h2>Balance Sheet</h2>
		<?php $total = 0; ?>
		<?php $dtotal = 0; ?>
		<?php $ctotal = 0; ?>
			<ul class="list-group">
				@foreach($accounts as $account)
					<li class="list-group-item">{{$account->name}}</li>
					
					<table class="table table-responsive table-bordered">
						<tr>
							<th width="50">Name</th>
							<th width="50">Amount</th>
							
						</tr>
						<?php
							$balance = 0;
						?>

						@foreach($account->childs as $child)
							@foreach($child->journalTransctions as $transction)
								<?php 
									$balance = $balance + (int)$transction->debit_amount - (int)$transction->credit_amount; 
									$dtotal += (int)$transction->debit_amount - (int)$transction->credit_amount; 

								?>
							@endforeach
							
							<tr>
								<td  width="50%">{{$child->name}}</td>

								<td width="50%">
									
										{{$balance}}
									
								</td>
								
							</tr>
							
							<?php $balance =0; ?>
						@endforeach
						@if($dtotal<0 && $income>0)
						<?php $dtotal += $income ?>
							<tr>
								<td>Loss</td>
								<td>{{$income}}</td>
							</tr>
						@endif
						@if($dtotal>0 && $income<0)
							<tr>
								<td>Profit</td>
								<td>{{$income}}</td>
							</tr>
						@endif
						
						
					</table>
					<table class="table table-bordered">
						<tr>
							<td width="50%"><strong>Total</strong></td>
							<td width="50%">
								
								{{$dtotal}}
								
							</td>
							
						</tr>
					</table>
					<?php $dtotal=0; ?>
				@endforeach
			</ul>
			
		
	</div>
@stop