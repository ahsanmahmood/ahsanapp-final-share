<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth Routes
Route::post('login','Auth\LoginController@loginApi');
Route::post('register','Auth\RegisterController@registerApi');
Route::post('logout','Auth\LoginController@logoutApi');

// User Related Routes
Route::post('get-user-data', 'Api\ApiUserController@getUserData');
Route::post('edit-user-data', 'Api\ApiUserController@editUserData');

// Product Routes
Route::post('products', 'Api\ApiProductController@apiProducts');
Route::post('get-product-details', 'Api\ApiProductController@apiProductDetails');
Route::post('product-categories/products', 'Api\ApiProductController@apiGetProductByProductCategories');
Route::post('product-categories', 'Api\ApiProductController@apiProductCategories');
// Custom Order Router order placed by customer
Route::post('customer-order-product', 'Api\ApiProductController@customOrderProduct');

// Deals Routes
Route::post('deals', 'Api\ApiDealController@getAllDeals');

// Service Routes
Route::post('allservices', 'Api\ApiServiceController@allServicesInSystem');
Route::post('getservices', 'Api\ApiServiceController@getUserServices');
Route::post('addService', 'Api\ApiServiceController@addApiService');

// Service Categories Route
Route::post('allservicescategories', 'Api\ApiServiceController@allServicesCategories');

// Order Routes
Route::post('allorders', 'Api\ApiOrderController@getAllOrders');
Route::post('placeorder', 'Api\ApiOrderController@apiPlaceOrder');
Route::post('order-message', 'Api\ApiOrderController@orderMessage');

// Lat Lng Distance
Route::post('get-distance', 'Api\UserLatLngController@getLatLngDistance');

