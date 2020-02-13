@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/users/'.$user->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	@if(Auth::user()->roles[0]->id === 1)
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User Name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->name }}" name="name" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User Email</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="email" value="{{ $user->email }}" name="email" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User Password</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="password" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User Is Active</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="is_active" required="required" class="form-control" style="width: 100%;">
					<option>Please Select</option>
					@if($user->is_active === 0)
					<option value="0" selected="selected">Inactive (banned)</option>
					<option value="1" >Active (unbanned)</option>
					@elseif($user->is_active === 1)
					<option value="0">Inactive (banned)</option>
					<option value="1" selected="selected">Active (unbanned)</option>
					@endif
				</select>
			</div>
		</div>
	</div>
	@endif
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User first name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->first_name }}" name="first_name" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User last name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->last_nam }}" name="last_name" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User address</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->address }}" name="address" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User cnic</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->cnic }}" name="cnic" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User location</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->location }}" name="location" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User city</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->city }}" name="city" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User skills</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->skills }}" name="skills" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User occupation</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->occupation }}" name="occupation" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User user type</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" value="{{ $user->user_type }}" name="user_type" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>User pic</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="file" name="profile_image">
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