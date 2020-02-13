@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/order/'.$item->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>created by</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="created_by" required="required" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($users as $user)
					@if($user->id == $item->created_by)
					<option value="{{ $user->id }}" selected="selected">{{ $user->id }} - {{ $user->name }}</option>
					@else
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endif
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
					@if($user->id == $item->buyer_id)
					<option value="{{ $user->id }}" selected="selected">{{ $user->id }} - {{ $user->name }}</option>
					@else
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endif
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
					@if($user->id == $item->seller_id)
					<option value="{{ $user->id }}" selected="selected">{{ $user->id }} - {{ $user->name }}</option>
					@else
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div> -->
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product_id</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="product_id" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($products as $product)
					@if($product->id == $item->product_id)
					<option value="{{ $product->id }}" selected="selected">{{ $product->id }} - {{ $product->name }}</option>
					@else
					<option value="{{ $product->id }}">{{ $product->id }} - {{ $product->name }}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>order_status</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				@if($item->order_status == 1)
				<input type="radio" name="order_status" checked="checked" required="required" value="1">Pending
				<input type="radio" name="order_status" required="required" value="2">Processing
				<input type="radio" name="order_status" required="required" value="3">Completed
				<input type="radio" name="order_status" required="required" value="4">Cancelled
				@elseif($item->order_status == 2)
				<input type="radio" name="order_status" required="required" value="1">Pending
				<input type="radio" name="order_status" checked="checked" required="required" value="2">Processing
				<input type="radio" name="order_status" required="required" value="3">Completed
				<input type="radio" name="order_status" required="required" value="4">Cancelled
				@elseif($item->order_status == 3)
				<input type="radio" name="order_status" required="required" value="1">Pending
				<input type="radio" name="order_status" required="required" value="2">Processing
				<input type="radio" name="order_status" checked="checked" required="required" value="3">Completed
				<input type="radio" name="order_status" required="required" value="4">Cancelled
				@elseif($item->order_status == 4)
				<input type="radio" name="order_status" required="required" value="1">Pending
				<input type="radio" name="order_status" required="required" value="2">Processing
				<input type="radio" name="order_status" required="required" value="3">Completed
				<input type="radio" name="order_status" checked="checked" required="required" value="4">Cancelled
				@endif
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
					@if($service->id == $item->service_id)
					<option value="{{ $service->id }}" selected="selected">{{ $service->id }} - {{ $service->title }}</option>
					@else
					<option value="{{ $service->id }}">{{ $service->id }} - {{ $service->title }}</option>
					@endif
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
					@if($deal->id == $item->deal_id)
					<option value="{{ $deal->id }}" selected="selected">{{ $deal->id }} - {{ $deal->title }}</option>
					@else
					<option value="{{ $deal->id }}">{{ $deal->id }} - {{ $deal->title }}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
	</div> -->
	<div class="row form-group">		
		
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>
@endsection