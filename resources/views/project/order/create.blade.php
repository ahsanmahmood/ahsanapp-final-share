@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/order/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>created by</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="created_by" required="required" class="form-control" style="width: 100%;">
					@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>customer</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="buyer_id" required="required" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row form-group">
		<!-- <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>seller_id</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="seller_id" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div> -->
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="product_id" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($products as $product)
					<option value="{{ $product->id }}">{{ $product->id }} - {{ $product->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>order status</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="radio" name="order_status" required="required" value="1">Pending
				<input type="radio" name="order_status" required="required" value="2">Processing
				<input type="radio" name="order_status" required="required" value="3">Completed
				<input type="radio" name="order_status" required="required" value="4">Cancelled
			</div>
		</div>
	</div>
	<!-- <div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>service_id</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="service_id" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($services as $service)
					<option value="{{ $service->id }}">{{ $service->id }} - {{ $service->title }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>deal_id</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="deal_id" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($deals as $deal)
					<option value="{{ $deal->id }}">{{ $deal->id }} - {{ $deal->title }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div> -->
	<div class="row form-group">		
		
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Create</button>
		</div>
	</div>
</form>
@endsection