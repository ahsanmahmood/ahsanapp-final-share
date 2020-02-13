<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Order;
use App\Models\UserDetails;

class ApiProductController extends Controller
{
    public function apiProducts(Request $request)
    {
        // dd($request->toArray());
        $api_tokens = User::pluck('api_token')->toArray();
        // dd($request->api_token,in_array($request->api_token, $api_tokens), $api_tokens );
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $items = Product::all();
            return response()->json(['data' => $items->toArray()], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

    public function apiProductDetails(Request $request)
    {
        // dd($request->toArray());
        $api_tokens = User::pluck('api_token')->toArray();
        // dd($request->api_token,in_array($request->api_token, $api_tokens), $api_tokens );
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $items = Product::where('id', $request->product_id)->first();
            return response()->json(['data' => $items->toArray()], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

    public function apiGetProductByProductCategories(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $items = Product::where('category_id',$request->id)->get();
            return response()->json(['data' => $items->toArray()], 200);        
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

    public function apiProductCategories(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $items = ProductCategory::all();
            return response()->json(['data' => $items->toArray()], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

    public function customOrderProduct(Request $request)
    {
        // dd($request->toArray());
        $api_tokens = User::pluck('api_token')->toArray();
        // dd($request->api_token,in_array($request->api_token, $api_tokens), $api_tokens );
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $image = '';
            if($request->hasfile('product_image')){
                $image_array = $request->file('product_image');
                $image_ext = $image_array->getClientOriginalExtension();
                $image = "img_".rand(123456,999999).".".$image_ext;
                $destination_path = public_path('/project-assets/uploaded/images/');
                $image_array->move($destination_path,$image);
            }
            $product = Product::create([
                'created_by' => 1,
                'name' => $request->name,
                'description' => $request->description,
                'regular_price' => $request->regular_price,
                'product_image' => $image,
                'category_id' => 1,
                'status' => 'custom'
            ]);

            // dd($request->toArray());
            $order_price = 0;
            $order_service_charges = 0;
            $order_total_price = 0;

            $new_order_type = "";

            // for product
            $order_price = $order_price + $product->regular_price;
            $order_service_charges = (($product->regular_price*20)/100);
            $order_total_price = $order_price + $order_service_charges;
            $new_order_type = "product";

            $customer_user = UserDetails::where('user_id', $request->buyer_id)->first();
            
            $order_city = "";
            if ($customer_user) {
                $order_city = $customer_user->city;
            }

            Order::create([
                'created_by' => 1,
                'buyer_id' => $request->buyer_id,
                'seller_id' => $request->seller_id,
                'product_id' => $product->id,
                'order_status' => 1,
                'price' => $order_price,
                'service_charges' => $order_service_charges,
                'total_price' => $order_total_price,
                'city' => $order_city,
                'order_type' => $new_order_type
            ]);
            return response()->json(['data' => "Added"], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

}
