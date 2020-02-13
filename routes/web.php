<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\GoogleMap;

Route::get('/test_custom_route', 'TestController@TestRoute');


Auth::routes();

// All Test Routes (Api)
Route::get('test_token_expireIn', 'TestController@TokenExpireIn');
Route::get('test_routes', 'TestController@TestRoutes');
Route::post('test_login','Auth\LoginController@loginApi');
Route::post('test_register','Auth\RegisterController@registerApi');
Route::post('test_logout','Auth\LoginController@logoutApi');
	
	// Run Artisan Commands
	Route::get('artisan/{a}',function($a){
	    Artisan::call($a); 
	});


// Route::get('/home', 'HomeController@index')->name('home');


// Project Admin Roues
	Route::redirect('/','/admin');
	Route::redirect('/home','/admin');
	

	Route::group([
	// assign roles to user Route
		'middleware' => 'roles',
		'roles' => ['Super Admin', 'Admin'],
		'namespace' => 'Admin',
	], function () {

		Route::get('check-role',[
			'uses' => 'RoleController@CheckRole',
			'middleware' => 'roles',
			'roles' => ['Super Admin']
		]);
		Route::post('/assignrole',[
			'uses' => 'RoleController@assignRole',
			'as' => 'assign.roles',
			'middleware' => 'roles',
			'roles' => ['Super Admin']
		]);
		// Dashborad Routes
		Route::get('/admin', [
			'uses' => 'SystemController@showDashborad',
		]);

	
		// Users Routes
		Route::get('admin/users/admins', 'UserController@AdminUsers');		
		Route::get('admin/users/riders', 'UserController@RiderUsers');
		Route::get('admin/users/service-providers', 'UserController@ServiceProviderUsers');
		Route::get('admin/users/customers', 'UserController@CustomerUsers');
		Route::get('admin/users/banned', 'UserController@BannedUsers');
		Route::get('admin/users/{id}/ban', 'UserController@BanUser');				
		Route::get('admin/users/{id}/unban', 'UserController@UnBanUser');				
		Route::resource('admin/users', 'UserController');

		// Product routes
		Route::get('admin/feature-products','ProductController@FeatureProducts');
		Route::get('admin/sale-products','ProductController@SaleProducts');
		Route::resource('admin/product', 'ProductController');

		// Product Category Routes
		Route::resource('admin/product-category', 'ProductCategoryController');

		// Service Routes
		Route::get('admin/applied-service', 'ServiceController@AppliedServices');
		Route::resource('admin/service', 'ServiceController');

		// Service Category Routes
		Route::resource('admin/service-category', 'ServiceCategoryController');

		// Deal Routes
		Route::resource('admin/deal', 'DealController');

		// Order Routes
		Route::get('admin/applied-order', 'OrderController@AppliedOrders');
		Route::get('admin/admin-order', 'OrderController@AdminOrders');
		Route::post('admin/admin-order-action', 'OrderController@AdminOrdersAction');
		Route::get('admin/specific-order', 'OrderController@SpecificOrders');
		Route::post('admin/specific-order-action', 'OrderController@SpecificOrdersAction');
		Route::resource('admin/order', 'OrderController');

		// Invoice Routes
		Route::get('admin/admin-invoice', 'InvoiceController@AdminInvoice');
		Route::post('admin/admin-invoice-action', 'InvoiceController@AdminInvoiceAction');
		Route::get('admin/specific-invoice', 'InvoiceController@SpecificInvoices');
		Route::post('admin/specific-invoice-action', 'InvoiceController@SpecificInvoicesAction');
		Route::post('admin/invoice/addcoupon', 'InvoiceController@addCoupon');
		Route::post('admin/invoice/removecoupon', 'InvoiceController@removeCoupon');
		Route::resource('admin/invoice', 'InvoiceController');

		// Coupon Routes
		Route::resource('admin/coupon', 'CouponController');

		// Google Map Part Session Routes
		Route::get('/admin/google-map', function(){
		    $config = array();
		    $config['center'] = '31.5204,74.3587';
		    $config['zoom'] = '14';
		    $config['onclick'] = '
		    	$result = confirm(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());
		    	if($result) {
		    		$(`#lat`).val(event.latLng.lat());
		    		$(`#long`).val(event.latLng.lng());
		    	}';
		    GMaps::initialize($config);
		    $map = GMaps::create_map();
		    $c_map = GoogleMap::where('id', 1)->first();
			return view('project.google-map.index', compact('c_map'))->with('map', $map);
		});
		Route::post('admin/set-google-map-point', 'SystemController@setGoogleMapPoint');
		Route::post('admin/set-google-map-point-distance', 'SystemController@setGoogleMapPointDistance');
	});