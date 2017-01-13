@extends('layouts.app')
@section('content')
<div class="portlet box blue-madison">
    <div class="portlet-title">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Datatable with TableTools
            </div>
            <div class="tools">
            </div>
        </div>
    </div>
<div class="portlet-body">

        	<table class="table table-striped table-bordered table-hover" id="sample_1">
        		<tr>
        			<td>Date</td>
        			<td>Description</td>
                    <td>Amount</td>
        			<td>Balance</td>
        		</tr>
                @if($balance)
                    <tr style="text-align:  right;">
                        <td colspan="2">ByBalance</td>
                        <td colspan="2">{{$balance}}</td>
                    </tr>
                @endif
                @foreach($journalTransctions as $transaction)
                <tr>
                    <td>{{$transaction->date}}</td>
                    <td>{{$transaction->description}}</td>
                    <td>{{$transaction->credit_amount}}</td>
                    <td>{{$transaction->debit_amount}}</td>
                </tr>
                <?php  $balance = $balance + $transaction->debit_amount- $transaction->credit_amount; ?>
                <tr style="text-align: right">
                    <td colspan="2">By Balance</td>
                    <td colspan="2">{{$balance}}</td>
                </tr>

                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="2" >By Balance</td>
                        <td colspan="2" >2345</td>
                    </tr>
                </tfoot>
        	</table>
            <div class="row">
            <div class="col-md-7 col-sm-12">
            </div>
                <div class="col-md-5 col-sm-12">
                    {!! $journalTransctions->render() !!}
                </div>
            </div>
            
        </div>
 </div>       
@stop