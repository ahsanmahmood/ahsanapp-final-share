@extends('project.index')
@section('content')
<form method="post" action="{{ url('/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>order</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select class="form-control">
					<option value="">Please Select</option>
					@foreach($orders as $order)
					<option value="{{ $order->id }}">{{ $order->id }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>description</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="description" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Create</button>
		</div>
	</div>
</form>
@endsection