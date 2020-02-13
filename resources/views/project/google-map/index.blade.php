@extends('project.index')
@section('content')
@if(Session::has('updated'))
<div class="alert alert-success">
	{{Session::get('updated')}}
</div>
@endif
@if($c_map)
<h1>Current Saved Data</h1>
<div class="col-xs-4">
	<h4>Lat = {{ $c_map->lat }}</h4>
</div>
<div class="col-xs-4">
	<h4>Long = {{ $c_map->long }}</h4>
</div>
<div class="col-xs-4">
	<h4>Distance = {{ $c_map->distance }}km</h4>
</div>
@endif
<hr>
<h2>Set New Map Point</h2>
<form method="post" action="{{ url('admin/set-google-map-point') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Latitude</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="lat" id="lat" required="required" placeholder="31.5204" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Longitude</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="long" id="long" required="required" placeholder="74.3587" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Set New Points</button>
		</div>
	</div>
</form>
<hr>
<h2>Set distance from map point (km)</h2>
<form method="post" action="{{ url('admin/set-google-map-point-distance/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>Enter Distance (km)</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="number" name="distance" min="10" required="required" value="" placeholder="100" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary">Set Distance</button>
		</div>
	</div>
</form>
<hr>
{!!$map['js']!!}
{!!$map['html']!!}
@endsection