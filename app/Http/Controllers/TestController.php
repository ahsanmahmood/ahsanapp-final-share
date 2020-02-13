<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\UserDetails;
use App\Models\Role;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Deal;
use App\Models\Service;
use App\Models\Order;
use App\Models\Invoice;


use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function TestRoute()
    {
        $item[] = Product::all()->random(5)->pluck('id');
        // dd($item[0]->toArray());
        $new = implode(",", $item[0]->toArray());
        dd($new);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function TestRoutes()
    {
        $users = User::with('user_details')->with('roles')->get();
        //dd($users[0]->user_details->latitude);
        $products = Product::all();
        $categories = ProductCategory::all();
        return view('project.test-routes.index', compact(
            'users',
            'products',
            'categories'
        ));
    }

    public function TokenExpireIn()
    {
        $date = Carbon::now()->addHour(2)->toDateTimeString();
        dd($date);
    }
}
