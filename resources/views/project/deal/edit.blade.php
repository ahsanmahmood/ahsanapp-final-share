@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/deal/'.$item->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Title</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="title" required="required" value="{{ $item->title }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>description</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="description" required="required" value="{{ $item->description }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>image</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="file" name="image">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Service Charges</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="service_charges" value="{{ $item->service_charges }}" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>price</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="price" required="required" value="{{ $item->price }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">		
		<div class="col-xs-12">
			<div class="col-xs-1 d-inline-block">
				<strong>Products</strong>
			</div>
			<div class="col-xs-11 d-inline-block">
				@foreach($products as $item)
				@if(in_array($item->id, $last_products))
				<input checked="checked" type="checkbox" name="products[]" value="{{ $item->id }}">{{ $item->name }}
				@else
				<input type="checkbox" name="products[]" value="{{ $item->id }}">{{ $item->name }}
				@endif
				@endforeach
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>
@endsection