@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/product/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product Name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="name" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product description</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="description" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>is featured</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="is_featured" class="form-control" style="width: 100%;">
					<option value="0">Not Featured</option>
					<option value="1">Featured</option>
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Category</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="category_id" class="form-control" style="width: 100%;">
					@foreach($product_categories as $item)
					<option value="{{$item->id}}">{{ $item->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>on sale</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="on_sale" class="form-control" style="width: 100%;">
					<option value="0">Not On Sale</option>
					<option value="1">On Sale</option>
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product regular price</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="regular_price" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product sale price</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="sale_price" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product image</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="file" name="product_image">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product tags</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="tags" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product service charges</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="service_charges" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12">
			<div class="col-xs-2 d-inline-block">
				<strong>status</strong>
			</div>
			<div class="col-xs-10 d-inline-block">
				<select name="status" class="form-control" style="width: 100%;">
					<option value="0">Not Pusblish</option>
					<option value="1">Pusblish</option>
				</select>
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