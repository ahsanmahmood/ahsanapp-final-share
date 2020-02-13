@extends('project.index')
@section('content')
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
			@if($item->created_by == $user->id)
			{{ $user->name }}
			@endif
			@endforeach
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>customer</strong>
		</div>
		<div class="col-xs-9">
			@foreach($users as $user)
			@if($item->buyer_id == $user->id)
			{{ $user->name }}
			@endif
			@endforeach
		</div>
	</div>
	<!-- <div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>seller_id</strong>
		</div>
		<div class="col-xs-9">
			@foreach($users as $user)
			@if($item->seller_id == $user->id)
			{{ $user->name }}
			@endif
			@endforeach
		</div>
	</div> -->
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>product</strong>
		</div>
		<div class="col-xs-9">
			@foreach($products as $product)
			@if($item->product_id == $product->id)
			{{ $product->name }}
			@endif
			@endforeach
		</div>
	</div>
	<!-- <div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>service_id</strong>
		</div>
		<div class="col-xs-9">
			@foreach($services as $service)
			@if($item->service_id == $service->id)
			{{ $service->title }}
			@endif
			@endforeach
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>deal_id</strong>
		</div>
		<div class="col-xs-9">
			@foreach($deals as $deal)
			@if($item->deal_id == $deal->id)
			{{ $deal->title }}
			@endif
			@endforeach
		</div>
	</div> -->
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
			<strong>status</strong>
		</div>
		<div class="col-xs-9">
			@if($item->order_status == 1)
			Pending
			@elseif($item->order_status == 2)
			Processing
			@elseif($item->order_status == 3)
			Completed
			@elseif($item->order_status == 4)
			Cancelled
			@endif
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Actions</strong>
		</div>
		<div class="col-xs-9">
			<a href="{{ url('admin/order/'.$item->id.'/edit') }}" class="btn btn-info">Edit</a>
			<form method="post" class="d-inline-block" action="{{ url('admin/order/'.$item->id) }}">
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Invoice</strong>
		</div>
		<div class="col-xs-9">			
			@if(!$invoice)
			<form method="post" class="d-inline-block col-xs-12" action="{{ url('admin/invoice') }}">
				@csrf
				<input type="hidden" name="order_id" value="{{ $item->id }}">
					<select required="required" name="invoice_status" class="form-control" style="float: left; width: 70%;">
						<option value="">Please Select</option>
						<option value="Processing">Processing</option>
						<option value="Pending">Pending</option>
						<option value="Complete">Complete</option>
						<option value="Cancelled">Cancelled</option>
					</select>
				<button type="submit" class="btn btn-primary" style="float: left; width: 30%;">Make Invoice</button>
			</form>
			@else
			<a href="{{ url('admin/invoice/'.$invoice->id) }}" class="btn btn-warning">View Invoice</a>
			@endif
		</div>
	</div>
</div>
@endsection