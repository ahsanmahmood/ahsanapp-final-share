@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/product/'.$product->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product Name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $product->name }}" name="name" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product description</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $product->description }}" name="description" required="required" class="form-control" style="width: 100%;">
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
					@if($product->is_featured == 0)
					<option value="0" selected="selected">Not Featured</option>
					<option value="1">Featured</option>
					@elseif($product->is_featured == 1)
					<option value="0">Not Featured</option>
					<option value="1" selected="selected">Featured</option>
					@endif
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
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>on sale</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="on_sale" class="form-control" style="width: 100%;">
					@if($product->on_sale == 0)
					<option value="0" selected="selected">Not On Sale</option>
					<option value="1">On Sale</option>
					@elseif($product->on_sale == 1)
					<option value="0">Not On Sale</option>
					<option value="1" selected="selected">On Sale</option>
					@endif
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product regular price</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $product->regular_price }}" name="regular_price" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product sale price</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $product->sale_price }}" name="sale_price" required="required" class="form-control" style="width: 100%;">
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
				<input type="text" value="{{ $product->tags }}" name="tags" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>product service charges</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $product->service_charges }}" name="service_charges" required="required" class="form-control" style="width: 100%;">
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
					@if($product->status == 0)
					<option value="0" selected="selected">Not Pusblish</option>
					<option value="1">Pusblish</option>
					@elseif($product->status == 1)
					<option value="0">Not Pusblish</option>
					<option value="1" selected="selected">Pusblish</option>
					@endif
				</select>
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