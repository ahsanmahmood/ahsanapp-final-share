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
	@if(is_object(Auth::user()))
		@if(Auth::user()->roles[0]->id == 1)
		<div class="row border p-10 font-size-20">
			<div class="col-xs-3 border-right">
				<strong>Created By</strong>
			</div>
			<div class="col-xs-9">
				{{ $user_name ? $user_name : "No User Found" }}
			</div>
		</div>
		@else
		<div class="row border p-10 font-size-20">
			<div class="col-xs-3 border-right">
				<strong>Created By</strong>
			</div>
			<div class="col-xs-9">
				{{ Auth::user()->name }}
			</div>
		</div>
		@endif
	@endif
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>image</strong>
		</div>
		<div class="col-xs-9">
			<img class="img-responsives col-xs-12 col-sm-6 col-md-5 col-lg-4" src="{{ asset('/project-assets/uploaded/images/'.$product->category_image) }}" alt="No Image Added">
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>name</strong>
		</div>
		<div class="col-xs-9">
			{{ $product->name }}
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
			<strong>Actions</strong>
		</div>
		<div class="col-xs-9">
			<a href="{{ url('admin/product-category/'.$product->id.'/edit') }}" class="btn btn-info">Edit</a>
			<form method="post" class="d-inline-block" action="{{ url('admin/product-category/'.$product->id) }}">
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
</div>
@endsection