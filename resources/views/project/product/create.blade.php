@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/product/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<!-- <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product brand*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="brand" required="required" class="form-control" style="width: 100%;">
			</div>
		</div> -->
		<!-- <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product discount*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="discount" required="required" class="form-control" style="width: 100%;">
			</div>
		</div> -->
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product Name*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="name" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Category*</strong>
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
<!-- 	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product total_amount*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="total_amount" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product quantity*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="quantity" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div> -->
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product image*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="file" name="product_image">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product price*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="regular_price" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<!-- <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product expire date*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="expire_date" required="required" class="form-control" style="width: 100%;">
			</div>
		</div> -->
		<!-- <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product sizes*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="sizes" required="required" class="form-control" style="width: 100%;">
			</div>
		</div> -->
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product service charges*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="service_charges" required="required" class="form-control" style="width: 100%;">
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