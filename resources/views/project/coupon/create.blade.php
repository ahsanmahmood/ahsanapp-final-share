@extends('project.index')
@section('content')
<form method="post" action="{{ url('/admin/coupon') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>created_by</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="created_by" required="required" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($items as $user)
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>coupon_type</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="coupon_type" required="required" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					<option value="percentage">percentage</option>
					<option value="fixed">fixed</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>coupon_value</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="coupon_value" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>status</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="radio" name="status" required="required" value="on">on
				<input type="radio" name="status" required="required" value="off">off
			</div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>extra_field</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="extra_field" class="form-control" style="width: 100%;">
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