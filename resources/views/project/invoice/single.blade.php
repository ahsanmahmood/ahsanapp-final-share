@extends('project.index')
@section('content')
@if(Session::has('added'))
<div class="alert alert-success">
	{{ Session::get('added') }}
</div>
@endif
@if(Session::has('deleted'))
<div class="alert alert-danger">
	{{ Session::get('deleted') }}
</div>
@endif
<div class="custom_dive_1">
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>ID</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->id }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Created By</strong>
		</div>
		<div class="col-xs-9">
			@foreach($users as $user)
			@if($user->id == $item->created_by)
			{{ $user->name }}
			@endif
			@endforeach
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Order</strong>
		</div>
		<div class="col-xs-9">
			<a href="{{ url('admin/order/' .$item->order_id) }}">View Order</a>
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>status</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->invoice_status }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>price</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->price }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>service charges</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->service_charges }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>total price</strong>
		</div>
		<div class="col-xs-9">
			{{ $item->total_price }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>coupon</strong>
		</div>
		<div class="col-xs-9">
			@if(empty($item->coupon_id))
				<form method="post" class="d-inline-block col-xs-12" action="{{ url('admin/invoice/addcoupon') }}">
					@csrf
					<input type="hidden" name="invoice_id" value="{{ $item->id }}">
						<select required="required" name="coupon_id" class="form-control" style="float: left; width: 70%;">
							<option value="">Please Select</option>
							@foreach($coupons as $coupon)
								<option value="{{ $coupon->id }}">{{ $coupon->id }}: {{ $coupon->coupon_value }} {{ $coupon->coupon_type }}</option>
							@endforeach
						</select>
					<button type="submit" class="btn btn-primary" style="float: left; width: 30%;">Add Coupon</button>
				</form>
			@else
				<a href="{{ url('admin/coupon/'.$item->coupon_id) }}" class="btn btn-info">View Coupon</a>
				<form method="post" class="d-inline-block" action="{{ url('admin/invoice/removecoupon') }}">
					@csrf
					<input type="hidden" name="invoice_id" value="{{ $item->id }}">
						<input type="hidden" name="coupon_id" value="{{ $item->coupon_id }}">
					<button type="submit" class="btn btn-danger" style="">Remove Coupon</button>
				</form>
			@endif
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Actions</strong>
		</div>
		<div class="col-xs-9">
			<a href="{{ url('admin/invoice/'.$item->id.'/edit') }}" class="btn btn-info">Edit</a>
			<form method="post" class="d-inline-block" action="{{ url('admin/invoice/'.$item->id) }}">
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
</div>
@endsection