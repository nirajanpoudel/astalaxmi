@extends('layouts.app')
@section('styles')
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@stop
@section('content')
    
<div class="row">
    
        <div class="col-xs-12">
        <a href="{{url($fiscal_id.'/bills/create')}}" class="btn btn-success">Create</a>
			<table class="table table-responsive table-border table-condensed">
			
				<tr class="warning">
				@include('bills._search',['customers'=>$customers])
				</tr>
				
				<tr class="danger">
					<td>Client</td>
					<td>Date</td>
					<td>Bill Number</td>
					<td>Total</td>
                    <td>Status</td>
					<td>Action</td>
				</tr>
				@foreach($bills as $bill)
				<tr>
					
					<td>{{$bill->customer->first_name}}</td>
					<td>{{$bill->date}}</td>
					<td>{{$bill->bill_number}}</td>
					<td>{{$bill->total}}</td>
                    
					<td>
						@if($bill->status)
							<a href="{{url($fiscal_id.'/bills/status/'.$bill->id)}}" class="btn btn-success">Unverfied
							</a>
						@else
						<a href="{{url($fiscal_id.'/bills/status/'.$bill->id)}}" class="btn btn-danger">verified
							</a>
						@endif

					</td>
					
					
					<td>
						
						<div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    Dropdown
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						  <?php $i = 0; ?>
						  @foreach($bill->annotations as $a)
						   <?php $i += $a->receive_money ?>
						  @endforeach
						    <li>
						    
						    @if($i >= $bill->total || $bill->paid)
						    	<a href="">This Bill has already paid</a>
						    @else 
						    <a data-toggle="modal" href="#full-width" class="btn-view" data-href="{{url($fiscal_id.'/bills/'.$bill->id.'/payment')}}">
						    Make Paid</a>
						    @endif
						    </li>
						    <li><a data-toggle="modal" href="#full-width" class="btn-view" data-href="{{url($fiscal_id.'/bills/'.$bill->id.'/detail')}}">Detail</a></li>
						    <li><a data-toggle="modal" href="#full-width" class="btn-view" data-href="{{url($fiscal_id.'/bills/'.$bill->id)}}">View</a></li>
						    <li><a href="{{url($fiscal_id.'/bills/'.$bill->id.'/edit')}}" class="btn-view">Edit</a></li>
					
						  </ul>
						</div>
					</td>
				</tr>
				@endforeach
			</table>
        </div>
    </div>
@stop
@section('scripts')
<script src="{{ asset('assets/global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/admin/pages/scripts/ui-alert-dialog-api.js') }}"></script>
   <script>
(function($){
    function countRow(){
        return $(document).find('.added-row').length;
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

    $(document).on('keyup','.qtn',function(){
            price = $(this).parent().siblings('td').children('.price').val();
            qtn = $(this).val();
            $(this).parent().siblings().children('.total').val(qtn*price);
            sumSubtotal('.total');
    });
    $(document).on('keyup','.tax',function(){
            sumSubtotal('.total');
    });
        $(document).on('click','.btn-remove',function(){
           if(countRow()<2){
                return false; 
           }
            $(this).closest('tr').remove();
            sumSubtotal('.total');
        });
// btn-remove
        $(document).on('click','table .btn-add',function(){
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
        html += '<td><input type="text" class="form-control" name="bill_data['+$id+'][item]"></td>';
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
