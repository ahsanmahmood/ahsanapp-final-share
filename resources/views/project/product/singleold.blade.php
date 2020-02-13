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
			<strong>description</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->description }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>is featured</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->is_featured != 0 ? "Featured" : "Not Featured" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>on sale</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->on_sale != 0 ? "On Sale" : "Not on Sale" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>regular price</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->regular_price }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>sale price</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->sale_price }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>tags</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->tags }}
		</div>
	</div>
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
			<strong>status</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->status != 0 ? "Published" : "Not Published" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>service_charges</strong>
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