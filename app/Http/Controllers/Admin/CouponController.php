<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Coupon;

class CouponController extends Controller
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
            $items = Coupon::all();
            $items_total = Coupon::count();
        }
        else {
            $users = User::all();
            $items = Coupon::where('created_by',Auth::user()->id)->get();
            $items_total = Coupon::where('created_by',Auth::user()->id)->count();
        }
        return view('project.coupon.index', compact(
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
        if (Auth::user()->roles[0]->id == 1) {
            $items = User::all();
            $items_total = User::count();
        }
        else {
            $items = User::where('created_by',Auth::user()->id)->get();
            $items_total = User::where('created_by',Auth::user()->id)->count();
        }
        return view('project.coupon.create', compact(
            'items',
            'items_total'
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

        Coupon::create([
            'created_by' => $request->created_by,
            'coupon_type' => $request->coupon_type,
            'coupon_value' => $request->coupon_value,
            'status' => $request->status,
            'extra_field' => $request->extra_field
        ]);
        return redirect('admin/coupon')->with('added','Added Successfully!');
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
            $item = Coupon::where('id', $id)->first();
            $users = User::all();
            return view('project.coupon.single', compact(
                'item',
                'users'
            ));
        } else {
            $pro = Coupon::where('created_by',Auth::user()->id)->pluck('id');
            if (!in_array($id, $pro->toArray())) {
                return redirect('/admin/coupon')->with('error','Not Found');
            } else {
                $item = Coupon::where('id', $id)->first();
                $users = User::all();
                return view('project.coupon.single', compact(
                    'item',
                    'users'
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
        $item = Coupon::where('id', $id)->first();
        $users = User::all();
        return view('project.coupon.edit', compact(
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
        // dd($request->toArray());

        Coupon::where('id', $id)->update([
            'created_by' => $request->created_by,
            'coupon_type' => $request->coupon_type,
            'coupon_value' => $request->coupon_value,
            'status' => $request->status,
            'extra_field' => $request->extra_field
        ]);
        return redirect('admin/coupon')->with('updated','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::where('id',$id)->delete();
        return redirect('/admin/coupon')->with('deleted','Deleted Successfully!');
    }
}
