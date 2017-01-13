@extends('layouts.app')
@section('content')
	<div class="container">
		<h2>Income Statement</h2>
			<ul class="list-group">
			<?php $p=0 ?>
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
							@foreach($child->journalTransctions as $transction)
								<?php 
									$balance = $balance + (int)$transction->debit_amount - (int)$transction->credit_amount;
									$p += (int)$transction->debit_amount - (int)$transction->credit_amount;
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

				<table class="table table-bordered table-responsive">
					<tr>
						<td>Total Profit</td>
						<td>{{$p}}</td>
					</tr>
				</table>
			</ul>
			
		
	</div>
@stop