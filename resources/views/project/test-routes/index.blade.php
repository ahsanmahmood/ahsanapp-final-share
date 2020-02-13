<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('project-assets/css/bootstrap.css') }}">
    <style type="text/css">
    	h3 {
    		background: black;
    		color: white;
    		padding: 0 0 10px 0;
    		text-align: center;
    	}
    	.form-control {
    		height: auto;

    	}
    </style>
</head>
<body class="p-5">
	<h3 class="heading-route-test">Login</h3>
	<form method="post" action="{{ url('test_login/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>email</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="email" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>password</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="password" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Login</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Register</h3>
	<form method="post" action="{{ url('test_register/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>name</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="name" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>role</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<select name="role" required="required" class="form-control" style="width: 100%;">
						<option value="rider">Rider</option>
						<option value="customer">customer</option>
						<option value="service_provider">service_provider</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>email</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="email" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>password</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="password" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-info">Register</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Logout</h3>
	<form method="post" action="{{ url('test_logout/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-02">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-danger">Logout</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get User Data</h3>
	<form method="post" action="{{ url('api/get-user-data/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf

		<div class="row form-group">
			<div class="col-xs-6">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="api_token" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->api_token }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="user_id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-danger">User Data</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Edit User Data</h3>
	<form method="post" action="{{ url('api/edit-user-data/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>user api token</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="api_token" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->api_token }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>user id</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="user_id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
							<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>user first name</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="first_name" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>last_name</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="last_name" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>phone_number</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="phone_number" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>address</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="address" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>cnic</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="cnic" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>location</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="location" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>city</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="city" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>latitude</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="latitude" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>longitude</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="longitude" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>skills</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="skills" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>occupation</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="text" name="occupation" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-4 p-0">
				<div class="col-12 p-0 d-inline-block">
					<strong>profile_image</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<input type="file" name="profile_image">
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-danger">Update User Data</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get Products</h3>
	<form method="post" action="{{ url('api/products/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<button type="submit" class="btn btn-danger">products</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get Product details</h3>
	<form method="post" action="{{ url('api/get-product-details/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<div class="form-control">
			<label>product_id</label>
			<select name="product_id" required="required" class="form-control">
				@foreach($products as $product)
				<option value="{{$product->id}}">{{ $product->id }} -  {{ $product->name }}</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-danger">Get Product details</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get Products with Products Categories</h3>
	<form method="post" action="{{ url('api/product-categories/products') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<select name="id" required="required" class="form-control">
			@foreach($categories as $categorie)
			<option value="{{$categorie->id}}">{{ $categorie->id }} -  {{ $categorie->name }}</option>
			@endforeach
		</select>
		<button type="submit" class="btn btn-danger">get products of this product Categories</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get Products Categories</h3>
	<form method="post" action="{{ url('api/product-categories/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<button type="submit" class="btn btn-danger">product Categories</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get All Services</h3>
	<form method="post" action="{{ url('api/allservices/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<button type="submit" class="btn btn-danger">Get All Services</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get All ServicesCategories</h3>
	<form method="post" action="{{ url('api/allservicescategories/') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<button type="submit" class="btn btn-danger">Get All ServicesCategories</button>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Add Service</h3>
	<form method="post" action="{{ url('api/addService') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>title</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="title" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>description</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="description" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>image</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="file" name="image" required="required">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>time</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="time" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>price</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="price" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>extra_field</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="extra_field" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-12 p-02">
				<div class="col-12 p-0 d-inline-block">
					<strong>user</strong>
				</div>
				<div class="col-11 p-0 d-inline-block">
					<select name="user_id" required="required" class="form-control" style="width: 100%;">
						@foreach($users as $user)					
						<option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>category_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="category_id" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Add Service</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Place Order</h3>
	<form method="post" action="{{ url('api/placeorder') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>customer_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="customer_id" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>product_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="product_id" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>service_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="service_id" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>deal_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="deal_id" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Place Order</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<!-- <h3 class="heading-route-test">Place Order</h3>
	<form method="post" action="{{ url('api/placeorder') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>customer_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="customer_id" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-6">
				<div class="col-3 p-0 d-inline-block">
					<strong>product_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="product_id" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Place Order</button>
			</div>
		</div>
	</form>
	<hr>
	************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Place Order Message</h3>
	<form method="post" action="{{ url('api/order-message') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-sm-4">
				<div class="col-3 d-inline-block">
					<strong>user_id</strong>
				</div>
				<div class="col-9 d-inline-block">
					<input type="text" name="user_id" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-sm-4">
				<div class="col-3 p-0 d-inline-block">
					<strong>order_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="order_id" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-sm-4">
				<div class="col-3 p-0 d-inline-block">
					<strong>message</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="message" required="required" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-12 p-0 col-sm-4">
				<div class="col-3 d-inline-block">
					<strong>file</strong>
				</div>
				<div class="col-9 d-inline-block">
					<input type="file" name="file">
				</div>
			</div>
			<div class="col-12 p-0 col-sm-4">
				<div class="col-3 p-0 d-inline-block">
					<strong>extra_field</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="extra_field" class="form-control" style="width: 100%;">
				</div>
			</div>
			<div class="col-12 p-0 col-sm-4">
				<div class="col-3 p-0 d-inline-block">
					<strong>reciver_id</strong>
				</div>
				<div class="col-9 p-0 d-inline-block">
					<input type="text" name="reciver_id" class="form-control" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Place Order Message</button>
			</div>
		</div>
	</form>
	<hr>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<h3 class="heading-route-test">Get All Deals</h3>
	<form method="post" action="{{ url('api/deals') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Get All Deals</button>
			</div>
		</div>
	</form>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<hr>
	<h3 class="heading-route-test">Get All Services in system</h3>
	<form method="post" action="{{ url('api/allservices') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Get All Services</button>
			</div>
		</div>
	</form>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<hr>
	<h3 class="heading-route-test">Get All Services of any Users</h3>
	<form method="post" action="{{ url('api/getservices') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<select name="id" required="required" class="form-control">
			@foreach($users as $user)
			<option value="{{$user->id}}">{{ $user->id }} -  {{ $user->name }}</option>
			@endforeach
		</select>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Get All Services of this user</button>
			</div>
		</div>
	</form>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<hr>
	<h3 class="heading-route-test">Get All Orders of any Users</h3>
	<form method="post" action="{{ url('api/allorders') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<select name="id" required="required" class="form-control">
			@foreach($users as $user)
			<option value="{{$user->id}}">{{ $user->id }} -  {{ $user->name }}</option>
			@endforeach
		</select>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Get All Orders</button>
			</div>
		</div>
	</form>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<hr>
	<h3 class="heading-route-test">Get Distance between two users</h3>
	<form method="post" action="{{ url('api/get-distance') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>lat</label>
			<input type="text" name="lat" required="required">
		</div>
		<div class="form-control">
			<label>long</label>
			<input type="text" name="long" required="required">
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Get get distance</button>
			</div>
		</div>
	</form>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
	<hr>
	<h3 class="heading-route-test">Place customer order product</h3>
	<form method="post" action="{{ url('api/customer-order-product') }}" class="custom_div_1" enctype="multipart/form-data">
		@csrf
		<div class="form-control">
			<label>api_token</label>
			<input type="text" name="api_token">
		</div>
		<div class="form-control">
			<label>name</label>
			<input type="text" name="name">
		</div>
		<div class="form-control">
			<label>description</label>
			<input type="text" name="description">
		</div>
		<div class="form-control">
			<label>product_image</label>
			<input type="file" name="product_image">
		</div>
		<div class="form-control">
			<label>regular_price</label>
			<input type="text" name="regular_price">
		</div>
		<div class="form-control">
			<label>buyer</label>
			<select name="buyer_id" required="required" class="form-control">
				@foreach($users as $user)
					<option value="{{ $user->user_details->latitude }} , {{ $user->user_details->longitude }}">{{ $user->id }} -  {{ $user->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-control">
			<label>seller</label>
			<select name="seller_id" required="required" class="form-control">
				@foreach($users as $user)
					<option value="{{ $user->user_details->latitude }} , {{ $user->user_details->longitude }}">{{ $user->id }} -  {{ $user->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="row from-group">
			<div class="col-12 p-02">
				<button type="submit" class="btn btn-success">Get All Orders</button>
			</div>
		</div>
	</form>
	<!-- ************************************************************************************* -->
	<!-- ************************************************************************************* -->
</body>
<script src="{{ asset('project-assets/js/jquery.js') }}"></script>
<script src="{{ asset('project-assets/js/popper.js') }}"></script>
<script src="{{ asset('project-assets/js/bootstrap.js') }}"></script>
</html>