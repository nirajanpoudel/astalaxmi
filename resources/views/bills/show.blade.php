    <div class="row">
        <div class="col-xs-12">
        
  
    		<div class="invoice-title">
    			<h2>Bills</h2><h3 class="pull-right">Order # {{$bill_number[0]->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					Name: {{$bill->customer->first_name}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Date:</strong>
                        <span>{{$bill->date}}</span>

    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                            
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php $a = 0; ?>
                                @foreach($bill->bill_data as $item)

    							<tr>
    								<td>
                                   
                                    {{$item['item']}}
                                    
                                    </td>
    								<td class="text-center">
                                         
                                        {{$item['price']}}                      
                                    </td>
    								<td class="text-center">
                                       
                                        {{$item['qtn']}}                        
                                    </td>
    								<td class="text-right">
                                    <span>Total:</span>  
                                    {{($item['price']*$item['qtn'])}}  
                                    <?php $a += ($item['price']*$item['qtn']); ?>                    
                                    </td>
    							</tr>
                                @endforeach
                               
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Total</strong></td>
    								<td class="thick-line text-right">{{$a}}</td>
    							</tr>
    							
    							
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
