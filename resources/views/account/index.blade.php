@extends('layouts.app')
@section('styles')
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@stop
@section('pageTitle')
<h3 class="page-title">Accounts List</h3>
@stop
@section('content')
<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-gift"></i>Accont Name
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse" data-original-title="" title="">
				</a>
				<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
				</a>
			</div>
		</div>
	<div class="portlet-body">
	
		<div class="tabbable-custom nav-justified">
					<ul class="nav nav-tabs nav-justified">
					@foreach($accounts as $i=>$account)
						<li class="{{ ($i==0) ? 'active' : 'Default' }}">
							<a href="#{{$account->name}}" data-toggle="tab" aria-expanded="true">
							{{$account->name}} </a>
						</li>
					@endforeach	
					
					</ul>
					<div class="tab-content">
					@foreach($accounts as $i=>$account)
						<div class="tab-pane {{ ($i==0) ? 'active' : 'Default' }}" id="{{$account->name}}">
							<a data-href="{{url($fiscal_id.'/accounts/'.$account->id.'/child/create')}}" class="btn btn-view btn-danger" data-toggle="modal" href="#responsive">Add New</a>
								<table class="table">
									@foreach($account->childs as $i=>$child)
									<tr>
										<td>
											<strong>{{$child->name}}</strong>
			<a href="javascript:;" id="username" data-type="text" data-pk="" data-url="url('accounts/'+$account_id+'/child') }}" class="account" data-original-title="Enter Account Name" class="editable editable-click">

											{{$child->name}}
											</a>

						

										</td> 
											<td>
												
												<button data-href="{{url($fiscal_id.'/accounts/'.$child->id.'/edit')}}" type="button" class="btn btn-primary btn-view" data-toggle="modal" href="#responsive">Edit</button>
												<a  data-href="{{url($fiscal_id.'/ledger/'.$child->id)}}" class="btn btn-success btn-view" data-toggle="modal" href="#full-width">Ledger</a>
											</td>
										</tr>

									@endforeach
								</table>
						</div>
					@endforeach
				</div>
		</div>

</div>
</div>
		

	
	

@stop

@section('script')
	<script>
		(function($){
			$(document).on('click','btn-save',function(e){
				e.preventDefault();
				
			});
		})(jQuery);
	</script>

@stop