<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Order;
use App\Models\Deal;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();        
        $items = Service::all();
        $items_total = Service::count();
        return view('project.service.index', compact(
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
        $users = User::all();
        $categories = ServiceCategory::all();
        return view('project.service.create', compact(
            'users',
            'categories'
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

        $image = '';
        if($request->hasfile('image')){
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('project-assets/uploaded/images/');
            $image_array->move($destination_path,$image);
        }

        Service::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'time' => $request->time,
            'price' => $request->price,
            'image' => $image,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'extra_field' => $request->extra_field
        ]);
        return redirect('admin/service')->with('added','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Service::where('id', $id)->first();
        $user = User::where('id', $item->user_id)->first();
        $categories = ServiceCategory::all();
        $user_name = $user['name'];
        // dd($product);
        return view('project.service.single', compact(
            'item',
            'user_name',
            'categories'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $categories = ServiceCategory::all();
        $item = Service::where('id', $id)->first();
        return view('project.service.edit', compact(
            'users',
            'item',
            'categories'
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
        $item = Service::where('id', $id)->first();
        $image = '';
        if($request->hasfile('image')){
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$image);
            // @unlink(public_path('project-assets\uploaded\images/') . $item->category_image);
        }

        Service::where('id',$id)->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image == "" ? $item->image : $image,
            'time' => $request->time,
            'price' => $request->price,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'extra_field' => $request->extra_field
        ]);
        return redirect('admin/service')->with('updated','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Service::where('id',$id)->first();
        // @unlink(public_path('project-assets\uploaded\images/') . $item->product_image);
        Service::where('id',$id)->delete();
        return redirect('/admin/service')->with('deleted','Deleted Successfully!');
    }

    public function AppliedServices()
    {
        $users = User::all();
        $deals = Deal::all();
        $products = Product::all();
        $categories = ServiceCategory::all();
        $services = Service::all();
        if (Auth::user()->roles[0]->id == 1) {
            $items = Order::all();
            $items_total = Order::count();
        }
        else {
            $items = Order::where('created_by',Auth::user()->id)->get();
            $items_total = Order::where('created_by',Auth::user()->id)->count();
        }
        return view('project.service.applied', compact(
            'items',
            'items_total',
            'users',
            'deals',
            'products',
            'services',
            'categories'
        ));
    }
}
