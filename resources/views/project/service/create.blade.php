@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/service/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Title</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="title" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>description</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="description" required="required" class="form-control" style="width: 100%;">
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
				<input type="text" name="time" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>price</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="price" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>location</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="location" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Category*</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="category_id" class="form-control" style="width: 100%;">
					@foreach($categories as $item)
					<option value="{{$item->id}}">{{ $item->name }}</option>
					@endforeach
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