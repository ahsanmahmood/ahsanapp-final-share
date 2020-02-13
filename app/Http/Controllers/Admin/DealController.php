<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Models\Deal;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();        
        $items = Deal::all();
        $items_total = Deal::count();
        return view('project.deal.index', compact(
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
        $products = Product::all();
        return view('project.deal.create', compact(
            'products'
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

        // dd(join($request->products, ','));

        $image = '';
        if($request->hasfile('image')){
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('\project-assets\uploaded\images/');
            $image_array->move($destination_path,$image);
        }

        $new_products = "";
        if ($request->products) {
            $new_products = join($request->products, ',');
        }

        Deal::create([
            'created_by' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'products' => $new_products,
            'price' => $request->price,
            'image' => $image,
            'service_charges' => $request->service_charges,
            'extra_field' => $request->extra_field,
        ]);
        return redirect('admin/deal')->with('added','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Deal::where('id', $id)->first();
        $user = User::where('id', $item->created_by)->first();
        $user_name = $user['name'];
        // dd($product);
        return view('project.deal.single', compact(
            'item',
            'user_name'
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
        $products = Product::all();
        $item = Deal::where('id', $id)->first();
        // dd(explode(',', $item->products));
        $last_products = [];
        if ($item->products) {
            $last_products = explode(',', $item->products);
        }
        return view('project.deal.edit', compact(
            'item',
            'products',
            'last_products'
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
        $item = Deal::where('id', $id)->first();
        $image = '';
        if($request->hasfile('image')){
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$image);
            // @unlink(public_path('project-assets\uploaded\images/') . $item->category_image);
        }

        $new_products = "";
        if ($request->products) {
            $new_products = join($request->products, ',');
        }

        Deal::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'products' => $new_products,
            'price' => $request->price,
            'image' => $image == "" ? $item->image : $image,
            'service_charges' => $request->service_charges,
            'extra_field' => $request->extra_field,
        ]);
        return redirect('admin/deal')->with('updated','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Deal::where('id',$id)->first();
        // @unlink(public_path('project-assets\uploaded\images/') . $item->product_image);
        Deal::where('id',$id)->delete();
        return redirect('/admin/deal')->with('deleted','Deleted Successfully!');
    }
}