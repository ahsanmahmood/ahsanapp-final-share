@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/service/'.$item->id) }}" class="custom_div_1" enctype="multipart/form-data">
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
				<strong>User</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="user_id" required="required" class="form-control">
					@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Time</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="time" required="required" value="{{ $item->time }}" class="form-control" style="width: 100%;">
			</div>
		</div>
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
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>location</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="location" required="required" value="{{ $item->location }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Category*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="category_id" class="form-control" style="width: 100%;">
					@foreach($categories as $category)
						@if($item->category_id != null)
							@if($category->id == $item->category_id)
							<option value="{{$category->id}}" selected="selected">{{ $category->name }}</option>
							@else
							<option value="{{$category->id}}">{{ $category->name }}</option>
							@endif
						@else
						<option value="{{$category->id}}">{{ $category->name }}</option>
						@endif						
					@endforeach
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