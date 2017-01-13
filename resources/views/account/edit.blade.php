<form action="{{ url($fiscal_id.'/accounts/'.$account->id) }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" name="_method" value="PATCH">
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" value="{{$account->name}}" class="form-control" name="name">
		</div>
		
		<div class="form-group">
			<label for="">Parent</label>
			<select name="parent_id" id="" class="form-control">
			<option value="">--Select--</option>
			@foreach($parents as $ac)
				<option @if($account->parent_id==$ac->id) selected @endif value="{{$ac->id}}">{{$ac->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<button>Save</button>
		</div>
		
</form>
