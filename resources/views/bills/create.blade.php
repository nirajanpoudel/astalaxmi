@extends('layouts.app')
@section('content')
    
       <form action="{{url($fiscal_id.'/bills')}}" name="" class="billForm" method="post">
        <div class="col-xs-12">
 
        {!! csrf_field() !!}
    		<div class="bill-title">
            <input type="hidden" name="bill_number" value="{{++$bill_number[0]->id}}">
    			<h2>Bills</h2><h3 class="pull-right">Order # {{$bill_number[0]->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
                    @if(Request::get('customer_id'))
                        <input type="text" name="client_id"  value="{{Request::get('customer_id')}}" readonly>
                    @else
    					<select name="client_id" class="select2me form-control" id="select2_sample2" data-placeholder="Select a client">
                        <option value="">--Select--</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->first_name}}</option>   
                            @endforeach            
                        </select>
                    @endif
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-6 col-xs-6">
    				
                    <div>
                        
                    </div>
    			</div>
    			<div class="col-md-6  col-xs-6 text-right">
    				<address class="pull-right">
    					<strong>Date:</strong>
                        <input type="text" class="form-control input-medium" name="date" />

    				</address>
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
        							<td class="text-center"><strong>Rate</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
        							<td class="text-right"><strong>Action</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr class="added-row">
    								<td>
                                    
                                    <textarea name="" class="form-control" name="bill_data[0][item]" id="" cols="20" rows="2"></textarea>
                                    </td>
    								<td class="text-center">
                                        <input type="text" class="price form-control" name="bill_data[0][price]">                        
                                    </td>
    								<td class="text-center">
                                        <input type="text" class="qtn form-control" name="bill_data[0][qtn]">                       
                                    </td>
    								<td class="text-right">
                                    <span></span>
                                    <input type="text" class="form-control total" name="bill_data[0][total]">              
                                    </td>
                                    <td>
                                        <span class="btn btn-remove btn-danger"  >-</span>
                                    </td>
    							</tr>
                               <!--  <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Discount</strong></td>
                                    <td class="no-line text-right">
                                        <input type="text" name="tax" class="form-control" value="13">
                                    </td>
                                </tr> -->
                                <tr>
                                    <td class="thick-line">
                                                             
                                    </td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Total</strong></td>
                                    <td class="thick-line text-right">
                                    <input type="text" class="form-control sub-total" name="sub-total">
                                    <span></span>
                                    </td>
                                </tr>
                               <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>VAT(%)</strong></td>
                                    <td class="no-line text-right">
                                        <input type="text" name="tax" class="form-control tax" value="13">
                                    </td>
                                </tr>
    							<tr>
    								<td class="thick-line">
                                        <span class="btn btn-add btn-primary">+ Row</span>                        
                                    </td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Total</strong></td>
    								<td class="thick-line text-right">
                                    <input type="text" class="form-control grand-total" name="total">
                                    <span></span>
                                    </td>
    							</tr>
    							
    							
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
        	</div>
        </div>    
        <input type="submit" name="submit" class="btn btn-success btn-submit"  value="Create Bill" />
    </form>
    
@stop

@section('scripts')
<script src="{{ asset('assets/global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/admin/pages/scripts/ui-alert-dialog-api.js') }}"></script>
   <script>
(function($){
    function countRow(){
        return $('table').find('.added-row').length;
    }

    function sumSubtotal(item){
        var sum = 0;
            $(item).each(function(){
                sum += parseFloat($(this).val());
            });

            $(".sub-total").val(sum);
            var tax = $('.tax').val();
            var   taxable_amount = (sum*tax)/100;
             $(".grand-total").val(sum+taxable_amount);
    }

    $('table').on('keyup','.qtn',function(){
            price = $(this).parent().siblings('td').children('.price').val();
            qtn = $(this).val();
            $(this).parent().siblings().children('.total').val(qtn*price);
            sumSubtotal('.total');
    });
    $('table').on('keyup','.tax',function(){
            sumSubtotal('.total');
    });
        $('table').on('click','.btn-remove',function(){
           if(countRow()<2){
                return false; 
            $.toastr({
              "closeButton": true,
              "debug": false,
              "positionClass": "toast-top-right",
              "onclick": null,
              "showDuration": "1000",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            })
           }
            $(this).closest('tr').remove();
            sumSubtotal('.total');
        });
// btn-remove
        $('.table-responsive').on('click','table .btn-add',function(){
            // console.log("ll");
            $id =$('.table-responsive').find('tr.added-row').length;
            // $('tbody tr').after().append(html);
            $(addRow(++$id)).insertAfter($('tbody tr.added-row'));
        });
       
        // $('.btn-submit').on('click',function(e){
            // e.preventDefault();
        /*$('.billForm').submit(function(e){
            e.preventDefault();
            $.ajax({
               type: 'POST',
               url: $('.billForm').attr('action'),
               data: $('.billForm').serialize(),   // I WANT TO ADD EXTRA DATA + SERIALIZE DATA
               success: function(data){
                  console.log(data);
                  // $('.tampil_vr').text(data);
               }
            })
            .done( function( data, textStatus, jqXHR ) {
                // if the validation passes
            })
            .fail( function( jqXHR ) {
                if (jqXHR.status == 422)
                {
                    $.each(jqXHR.responseJSON, function (key, value) {
                        // your code here
                    });
                }
            });
        });*/

        // })

        


})(jQuery);
    
    function addRow($id){
      var html = '<tr class="added-row">';
        html += '<td><textarea class="form-control" name="bill_data['+$id+'][item]" id="" cols="20" rows="2"></textarea></td>';
        html += '<td><input type="text" class="price form-control" name="bill_data['+$id+'][price]"></td>';
        html += '<td><input type="text" class="qtn form-control" name="bill_data['+$id+'][qtn]"></td>';
        html += '<td><input type="text" class="form-control total" name="bill_data['+$id+'][total]"></td>';
     
        html += '<td><span class="btn btn-remove btn-danger">-</span></td>';
           html += '</tr>';
        return html;  
    }
      


        function calculateTotal(price,qtn){
            return price*qtn;
        }
        
    </script>
@stop