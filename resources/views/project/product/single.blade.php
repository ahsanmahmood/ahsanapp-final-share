@extends('project.index')
@section('content')
<div class="custom_dive_1">
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>ID</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->id }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>product image</strong>
		</div>
		<div class="col-xs-9">
			<img class="img-responsives col-xs-12 col-sm-6 col-md-5 col-lg-4" src="{{ asset('/project-assets/uploaded/images/'.$product->product_image) }}" alt="No Image Added">
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>brand</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->brand }}
		</div>
	</div>
	<!-- <div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>discount</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->discount }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>total amount</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->total_amount }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>quantity</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->quantity }}
		</div>
	</div> -->
	<!-- <div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>sizes</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->sizes }}
		</div>
	</div> -->
	<!-- <div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>expire date</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->expire_date }}
		</div>
	</div> -->
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>category</strong>
		</div>
		<div class="col-xs-9">
			@foreach($product_categories as $item)
				@if($product->category_id == $item->id)
				<span title="{{ $item->description }}">{{ $item->name }}</span>
				@endif
			@endforeach
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>price</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->regular_price }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>service charges</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->service_charges }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Actions</strong>
		</div>
		<div class="col-xs-9">
			<a href="{{ url('admin/product/'.$product->id.'/edit') }}" class="btn btn-info">Edit</a>
			<form method="post" class="d-inline-block" action="{{ url('admin/product/'.$product->id) }}">
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
</div>
@endsection