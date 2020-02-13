@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/product/'.$product->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product Name*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $product->name }}" name="name" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Category*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="category_id" class="form-control" style="width: 100%;">
					@foreach($product_categories as $item)
						@if($product->category != null)
							@if($item->id == $product->category->id)
							<option value="{{$item->id}}" selected="selected">{{ $item->name }}</option>
							@else
							<option value="{{$item->id}}">{{ $item->name }}</option>
							@endif
						@else
						<option value="{{$item->id}}">{{ $item->name }}</option>
						@endif						
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row form-group">
		<!-- <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product brand*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $product->brand }}" name="brand" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product discount*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="discount" value="{{ $product->discount }}" required="required" class="form-control" style="width: 100%;">
			</div>
		</div> -->
	</div>
<!-- 	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product total_amount*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="total_amount" value="{{ $product->total_amount }}"  required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product expire_date*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="expire_date" required="required" value="{{ $product->expire_date }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div> -->
	<div class="row form-group">
		<!-- <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product quantity*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="quantity" value="{{ $product->quantity }}" required="required" class="form-control" style="width: 100%;">
			</div>
		</div> -->
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product image</strong>
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
				<input type="number" value="{{ $product->regular_price }}" name="regular_price" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<!-- <div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product sizes*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="sizes" value="{{ $product->sizes }}" required="required" class="form-control" style="width: 100%;">
			</div>
		</div> -->
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product service charges*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" value="{{ $product->service_charges }}" name="service_charges" required="required" class="form-control" style="width: 100%;">
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