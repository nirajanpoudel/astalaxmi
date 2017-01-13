
	<form action="{{url($fiscal_id.'/products/'.$product->id)}}" method="post">

	{!! csrf_field() !!}
	<input type="hidden" name="_method" value="PATCH">
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" value="{{$product->title}}" class="form-control" name="title">
		</div>
		<div class="form-group">
			<label for="">Price</label>
			<input type="text" value="{{$product->price}}" class="form-control" name="price">
		</div>
		<div class="form-group">
			<label for="">Qtn</label>
			<input type="text" value="{{$product->qtn}}"  class="form-control" name="qtn">qtn
		</div>
		
		
		<div class="form-group">
			<button class="btn btn-primary">Create</button>
		</div>
	</form>

	
