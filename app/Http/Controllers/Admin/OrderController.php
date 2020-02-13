<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Models\UserDetails;
use App\Models\Order;
use App\Models\OrderChat;
use App\Models\Deal;
use App\Models\Product;
use App\Models\Service;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $deals = Deal::all();
        $products = Product::all();
        $services = Service::all();
        if (Auth::user()->roles[0]->id == 1) {
            $items = Order::all();
            $items_total = Order::count();
        }
        else {
            $items = Order::where('created_by',Auth::user()->id)->get();
            $items_total = Order::where('created_by',Auth::user()->id)->count();
        }
        return view('project.order.index', compact(
            'items',
            'items_total',
            'users',
            'deals',
            'products',
            'services'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $deals = Deal::all();
        $products = Product::all();
        $services = Service::all();
        return view('project.order.create', compact(
            'users',
            'deals',
            'products',
            'services'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->roles[0]->id == 1) {
            $item = Order::where('id', $id)->first();
            $users = User::all();
            $deals = Deal::all();
            $products = Product::all();
            $services = Service::all();
            $invoice = null;
            $invoices = Invoice::pluck('order_id');
            if (in_array($id, $invoices->toArray())) {
                $invoice = Invoice::where('order_id', $id)->first();
            }
            
            return view('project.order.single', compact(
                'item',
                'users',
                'deals',
                'products',
                'services',
                'invoice'
            ));
        } else {
            $pro = Order::where('created_by',Auth::user()->id)->pluck('id');
            if (!in_array($id, $pro->toArray())) {
                return redirect('/admin/order')->with('error','Not Found');
            } else {
                $item = Order::where('id', $id)->first();
                $product_categories = ProductCategory::where('created_by',Auth::user()->id)->get();
                $users = User::where('created_by',Auth::user()->id)->get();
                $deals = Deal::where('created_by',Auth::user()->id)->get();
                $products = Product::where('created_by',Auth::user()->id)->get();
                $services = Service::where('created_by',Auth::user()->id)->get();
                $invoice = null;
                $invoices = Invoice::pluck('order_id');
                if (in_array($id, $invoices->toArray())) {
                    $invoice = Invoice::where('order_id', $id)->first();
                }
                return view('project.order.single', compact(
                    'item',
                    'users',
                    'deals',
                    'products',
                    'services',
                    'invoice'
                ));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Order::where('id', $id)->first();
        $users = User::all();
        $deals = Deal::all();
        $products = Product::all();
        $services = Service::all();
        return view('project.order.edit', compact(
            'item',
            'users',
            'deals',
            'products',
            'services'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->toArray());
        $order_price = 0;
        $order_service_charges = 0;

        // for product
        if (!empty($request->product_id)) {
            $product = Product::where('id', $request->product_id)->first();
            // if ($product->on_sale == "on_sale") {
            //     $order_price = $order_price + $product->regular_price;
            //     $order_service_charges = $order_service_charges + $product->service_charges;
            // } else {
            //     $order_price = $order_price + $product->sale_price;
            //     $order_service_charges = $order_service_charges + $product->service_charges;
            // }
            $order_price = $order_price + $product->regular_price;
            $order_service_charges = $order_service_charges + $product->service_charges;
        }

        // for deal
        if (!empty($request->deal_id)) {
            $deal = Deal::where('id', $request->deal_id)->first();
            $order_price = $order_price + $deal->price;
            $order_service_charges = $order_service_charges + $deal->service_charges;
        }
        
        // for service
        if (!empty($request->service_id)) {
            $service = Service::where('id', $request->service_id)->first();
            $order_price = $order_price + $service->price;
        }

        Order::where('id',$id)->update([
            'created_by' => Auth::user()->id,
            'buyer_id' => $request->buyer_id,
            'seller_id' => $request->seller_id,
            'product_id' => $request->product_id,
            'service_id' => $request->service_id,
            'deal_id' => $request->deal_id,
            'order_status' => $request->order_status,
            'price' => $order_price,
            'service_charges' => $order_service_charges
        ]);
        return redirect('admin/order')->with('updated','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id',$id)->delete();
        Invoice::where('order_id', $id)->delete();
        return redirect('/admin/order')->with('deleted','Deleted Successfully!');
    }

    public function AppliedOrders()
    {
        $users = User::all();
        $deals = Deal::all();
        $products = Product::all();
        $services = Service::all();
        if (Auth::user()->roles[0]->id == 1) {
            $items = OrderChat::all();
            $items_total = OrderChat::count();
        }
        else {
            $items = OrderChat::where('created_by',Auth::user()->id)->get();
            $items_total = OrderChat::where('created_by',Auth::user()->id)->count();
        }
        return view('project.order.applied', compact(
            'items',
            'items_total',
            'users',
            'deals',
            'products',
            'services'
        ));
    }

    public function AdminOrders()
    {
        if (Auth::user()->roles[0]->id == 1) {
            $items = User::all();
            $items_total = User::count();
        }
        else {
            $items = User::where('created_by',Auth::user()->id)->get();
            $items_total = User::where('created_by',Auth::user()->id)->count();
        }
        return view('project.order.admin_report', compact(
            'items',
            'items_total'
        ));
    }

    public function AdminOrdersAction(Request $request)
    {
        // dd($request->toArray());
        $admin = UserDetails::where('user_id', $request->user_id)->first();
        // dd($item->toArray());
        
        $users = User::all();
        $deals = Deal::all();
        $products = Product::all();
        $services = Service::all();
        $items = Order::where('city', $admin->city)->get();
        $items_total = Order::where('city', $admin->city)->count();
        return view('project.order.index', compact(
            'items',
            'items_total',
            'users',
            'deals',
            'products',
            'services'
        ));
    }

    public function SpecificOrders()
    {
        return view('project.order.specific');
    }

    public function SpecificOrdersAction(Request $request)
    {
        // dd($request->toArray());
        
        $users = User::all();
        $deals = Deal::all();
        $products = Product::all();
        $services = Service::all();
        $result_data = DB::table('orders');
        if ( !($request["start_date"] == "") ){
            $result_data->whereDate('created_at' , '>', $request["start_date"]);
        }
        if ( !($request["end_date"] == "") ){
            $result_data->whereDate('created_at', '<', $request["end_date"]);
        }
        $items = $result_data->latest()->get();
        $items_total = $result_data->count();
        return view('project.order.index', compact(
            'items',
            'items_total',
            'users',
            'deals',
            'products',
            'services'
        ));
    }
}
