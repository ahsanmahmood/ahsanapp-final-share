<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Models\UserDetails;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles[0]->id == 1) {
            $users = User::all();
            $items = Invoice::all();
            $items_total = Invoice::count();
        }
        else {
            $users = User::all();
            $items = Invoice::where('created_by',Auth::user()->id)->get();
            $items_total = Invoice::where('created_by',Auth::user()->id)->count();
        }
        return view('project.invoice.index', compact(
            'items',
            'items_total',
            'users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $orders = Order::all();
        // return view('project.invoice.create', compact('orders'));
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

        $invoice_price = 0;
        $invoice_service_charges = 0;
        $invoice_total_price = 0;

        // for order price to create invoice price
        $order = Order::where("id", $request->order_id)->first();
        $invoice_price = $invoice_price + $order->price;
        $invoice_service_charges = $invoice_service_charges + $order->service_charges;
        $invoice_total_price = $invoice_total_price + $order->total_price;

        $invoice_city = "";
        $order = Order::where('id', $request->order_id)->first();
        if ($order) {
            $invoice_city = $order->city;
        }
        
        Invoice::create([
            'created_by' => Auth::user()->id,
            'order_id' => $request->order_id,
            'invoice_status' => $request->invoice_status,
            'price' => $invoice_price,
            'service_charges' => $invoice_service_charges,
            'total_price' => $invoice_total_price,
            'city' => $invoice_city
        ]);
        return redirect('admin/invoice')->with('added','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupons = Coupon::all();
        if (Auth::user()->roles[0]->id == 1) {
            $item = Invoice::where('id', $id)->first();
            $users = User::all();
            return view('project.invoice.single', compact(
                'item',
                'users',
                'coupons'
            ));
        } else {
            $pro = Invoice::where('created_by',Auth::user()->id)->pluck('id');
            if (!in_array($id, $pro->toArray())) {
                return redirect('/admin/invoice')->with('error','Not Found');
            } else {
                $item = Invoice::where('id', $id)->first();
                $users = User::all();
                return view('project.invoice.single', compact(
                    'item',
                    'users',
                    'coupons'
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
        $item = Invoice::where('id', $id)->first();
        $users = User::all();
        return view('project.invoice.edit', compact(
            'item',
            'users'
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
        Invoice::where('id',$id)->update([
            'invoice_status' => $request->invoice_status
        ]);
        return redirect('admin/invoice')->with('updated','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::where('id',$id)->delete();
        return redirect('/admin/invoice')->with('deleted','Deleted Successfully!');
    }

    public function AdminInvoice()
    {
        if (Auth::user()->roles[0]->id == 1) {
            $items = User::all();
            $items_total = User::count();
        }
        else {
            $items = User::where('created_by',Auth::user()->id)->get();
            $items_total = User::where('created_by',Auth::user()->id)->count();
        }
        return view('project.invoice.admin_report', compact(
            'items',
            'items_total'
        ));
    }

    public function AdminInvoiceAction(Request $request)
    {
        // dd($request->toArray());
        $admin = UserDetails::where('user_id', $request->user_id)->first();
        // dd($item->toArray());
        
        $users = User::all();
        $items = Invoice::where('city', $admin->city)->get();
        $items_total = Invoice::where('city', $admin->city)->count();
        return view('project.invoice.index', compact(
            'items',
            'items_total',
            'users'
        ));
    }

    public function SpecificInvoices()
    {
        return view('project.invoice.specific');
    }

    public function SpecificInvoicesAction(Request $request)
    {
        // dd($request->toArray());
        
        $users = User::all();
        $result_data = DB::table('invoices');
        if ( !($request["start_date"] == "") ){
            $result_data->whereDate('created_at' , '>', $request["start_date"]);
        }
        if ( !($request["end_date"] == "") ){
            $result_data->whereDate('created_at', '<', $request["end_date"]);
        }
        $items = $result_data->latest()->get();
        $items_total = $result_data->count();
        return view('project.invoice.index', compact(
            'items',
            'items_total',
            'users'
        ));
    }

    public function addCoupon(Request $request)
    {
        // dd($request->toArray());
        $invoice = Invoice::where('id', $request->invoice_id)->first();
        $coupon = Coupon::where('id', $request->coupon_id)->first();
        if ($coupon->coupon_type == "percentage") {
            $new_total_price = $invoice->total_price - (($invoice->total_price*$coupon->coupon_value)/100);
        }
        elseif ($coupon->coupon_type == "fixed"){
            $new_total_price = $invoice->total_price - $coupon->coupon_value;
        }
        // dd($coupon->toArray(), $invoice->toArray(), $new_total_price);

        Invoice::where('id', $request->invoice_id)->update([
            'total_price' => $new_total_price,
            'coupon_id' => $request->coupon_id
        ]);
        return redirect('admin/invoice/'.$request->invoice_id)->with('added', 'Coupon Added!');
    }

    public function removeCoupon(Request $request)
    {
        // dd($request->toArray());
        $invoice = Invoice::where('id', $request->invoice_id)->first();
        $coupon = Coupon::where('id', $request->coupon_id)->first();
        if ($coupon->coupon_type == "percentage") {
            $new_total_price = $invoice->total_price + (($invoice->total_price*$coupon->coupon_value)/100);
        }
        elseif ($coupon->coupon_type == "fixed"){
            $new_total_price = $invoice->total_price + $coupon->coupon_value;
        }
        // dd($coupon->toArray(), $invoice->toArray(), $new_total_price);

        Invoice::where('id', $request->invoice_id)->update([
            'total_price' => $new_total_price,
            'coupon_id' => null
        ]);
        return redirect('admin/invoice/'.$request->invoice_id)->with('deleted', 'Coupon Added!');
    }
}
