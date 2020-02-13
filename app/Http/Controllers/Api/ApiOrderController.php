<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\UserDetails;
use App\Models\Order;
use App\Models\OrderChat;
use App\Models\Deal;
use App\Models\Product;
use App\Models\Service;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class ApiOrderController extends Controller
{
    
    public function apiPlaceOrder(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
        	
            // dd($request->toArray());
            $order_price = 0;
            $order_service_charges = 0;
            $order_total_price = 0;

            $new_order_type = "";

            // for product
            if (!empty($request->product_id)) {
                $product = Product::where('id', $request->product_id)->first();
                // if ($product->on_sale != "on_sale") {
                //     $order_price = $order_price + $product->regular_price;
                //     $order_service_charges = (($product->regular_price*20)/100);
                //     $order_total_price = $order_price + $order_service_charges;
                // } else {
                //     $order_price = $order_price + $product->sale_price;
                //     $order_service_charges = $order_service_charges + $product->service_charges;
                // }
                $order_price = $order_price + $product->regular_price;
                $order_service_charges = (($product->regular_price*20)/100);
                $order_total_price = $order_price + $order_service_charges;
                // dd($order_price, $order_service_charges);
                $new_order_type = "product";
            }

            // for deal
            if (!empty($request->deal_id)) {
                $deal = Deal::where('id', $request->deal_id)->first();
                $order_price = $order_price + $deal->price;
                $order_service_charges = (($deal->price*20)/100);
                $order_total_price = $order_price + $order_service_charges;
                $new_order_type = "deal";
            }
            
            // for service
            if (!empty($request->service_id)) {
                $service = Service::where('id', $request->service_id)->first();
                $order_price = $order_price + $service->price;
                $order_total_price = (($service->price*20)/100);
                $new_order_type = "service";
            }

            $customer_user = UserDetails::where('user_id', $request->buyer_id)->first();
            
            $order_city = "";
            if ($customer_user) {
                $order_city = $customer_user->city;
            }

            Order::create([
                'created_by' => Auth::user()->id,
                'buyer_id' => $request->buyer_id,
                'seller_id' => $request->seller_id,
                'product_id' => $request->product_id,
                'service_id' => $request->service_id,
                'deal_id' => $request->deal_id,
                'order_status' => $request->order_status,
                'price' => $order_price,
                'service_charges' => $order_service_charges,
                'total_price' => $order_total_price,
                'city' => $order_city,
                'order_type' => $new_order_type
            ]);
            return redirect('admin/order')->with('added','Added Successfully!');
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

    public function orderMessage(Request $request)
    {
        // dd($request->toArray());
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $new_file = '';
            if($request->hasfile('file')){
                $image_array = $request->file('file');
                $image_ext = $image_array->getClientOriginalExtension();
                $new_file = "file_".rand(123456,999999).".".$image_ext;
                $destination_path = public_path('/project-assets/uploaded/images/');
                $image_array->move($destination_path,$new_file);
                // @unlink(public_path('project-assets\uploaded\images/') . $product->file);
            }

            $city = "";
            $user = UserDetails::where('user_id', $request->user_id)->first();
            if ($user) {
                $city = $user->city;
            }
            
            OrderChat::create([
                'user_id' => $request->user_id,
                'order_id' => $request->order_id,
                'message' => $request->message,
                'file' => $new_file,
                'reciver_id' => $request->reciver_id,
                'city' => $city,
                'extra_field' => $request->extra_field
            ]);

            return response()->json(['data' => 'Message Added'], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

    public function getAllOrders(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $items = Order::where('buyer_id', $request->id)
                        ->join('products', 'products.id', 'orders.product_id')
                        ->select('orders.*', 'products.name as product_title', 'products.description as product_description', 'products.product_image as product_image')
                        ->get();
            return response()->json(['data' => $items->toArray()], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }
}
