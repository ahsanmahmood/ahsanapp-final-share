@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/coupon/'.$item->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>created_by</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="created_by" required="required" class="form-control" style="width: 100%;">
					<option value="">Please Select One</option>
					@foreach($users as $user)
					@if($user->id == $item->created_by)
					<option value="{{ $user->id }}" selected="selected">{{ $user->id }} - {{ $user->name }}</option>
					@else
					<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>coupon_type</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="coupon_type" required="required" value="{{ $item->coupon_type }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>coupon_value</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="coupon_value" required="required" value="{{ $item->coupon_value }}" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>status</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				@if($item->status == 'on')
				<input type="radio" name="status" checked="checked" required="required" value="on">on
				<input type="radio" name="status" required="required" value="off">off
				@elseif($item->status == 'off')
				<input type="radio" name="status" required="required" value="on">on
				<input type="radio" name="status" checked="checked" required="required" value="off">off
				@endif
			</div>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>extra_field</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="extra_field" value="{{ $item->extra_field }}" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary" style="float: left; width: 30%;">Update</button>
</form>
@endsection