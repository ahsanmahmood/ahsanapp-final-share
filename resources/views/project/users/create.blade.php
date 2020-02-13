@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/users/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="name" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Email</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="email" name="email" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Password</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="password" name="password" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Phone Number</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="phone_number" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Image</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="file" name="image" required="required">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>CNIC</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="cnic" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Location</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="location" required="required" value="" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>City</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="city" required="required" value="" class="form-control" style="width: 100%;">
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