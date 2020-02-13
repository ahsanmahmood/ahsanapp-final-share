@extends('project.index')
@section('content')
<div class="custom_dive_1">
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>ID</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->id }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>profile image</strong>
		</div>
		<div class="col-xs-9">
			<img class="img-responsives col-xs-12 col-sm-6 col-md-5 col-lg-4" src="{{ asset('/project-assets/uploaded/images/'.$user->user_details->profile_image) }}" alt="No Image Added">
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>first name</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->first_name != "" ? $user->user_details->first_name : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>last name</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->last_name != "" ? $user->user_details->last_name : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>User Name</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->name }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Email</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->email }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Phone Number</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->phone_number != "" ? $user->phone_number : "No Phone Numbe Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>CNIC</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->cnic != "" ? $user->user_details->cnic : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>address</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->address != "" ? $user->user_details->address : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>location</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->location != "" ? $user->user_details->location : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>city</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->city != "" ? $user->user_details->city : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>skills</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->skills != "" ? $user->user_details->skills : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>occupation</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->occupation != "" ? $user->user_details->occupation : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>user type</strong>
		</div>
		<div class="col-xs-9">
			{{ $user->user_details->user_type != "" ? $user->user_details->user_type : "Not Added Yet" }}
		</div>
	</div>
	<div class="row border p-10 font-size-20">
		<div class="col-xs-3 border-right">
			<strong>Actions</strong>
		</div>
		<div class="col-xs-9">
			@if($user->is_active == 0)
			<a href="{{ url('admin/users/'.$user->id.'/unban') }}" class="btn btn-warning">Unban this user</a>
			@elseif($user->is_active == 1)
			<a href="{{ url('admin/users/'.$user->id.'/ban') }}" class="btn btn-warning">Ban this user</a>
			@endif
			<a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-info">Edit</a>
			<form method="post" class="d-inline-block" action="{{ url('admin/users/'.$user->id) }}">
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
</div>
@endsection