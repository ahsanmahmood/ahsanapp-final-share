<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use App\Models\Product;
use App\Models\ProductCategory;

use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
            $items = Product::all();
            $items_total = Product::count();
        }
        else {
            $users = User::all();
            $items = Product::where('created_by',Auth::user()->id)->get();
            $items_total = Product::where('created_by',Auth::user()->id)->count();
        }
        return view('project.product.index', compact(
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
        $product_categories = ProductCategory::all();
        return view('project.product.create', compact('product_categories'));
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
        if($request->hasfile('product_image')){
            $image_array = $request->file('product_image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$image);
        }

        Product::create([
            'created_by' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'is_featured' => $request->is_featured,
            'on_sale' => $request->on_sale,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'product_image' => $image,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'status' => $request->status,
            'service_charges' => $request->service_charges,
            'brand' => $request->brand,
            'discount' => $request->discount,
            'total_amount' => $request->total_amount,
            'quantity' => $request->quantity,
            'sizes' => $request->sizes,
            'expire_date' => $request->expire_date,
        ]);
        return redirect('admin/product')->with('added','Added Successfully!');
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
            $product = Product::where('id', $id)->first();
            $product_categories = ProductCategory::all();
            
            return view('project.product.single', compact(
                'product',
                'product_categories'
            ));
        } else {
            $pro = Product::where('created_by',Auth::user()->id)->pluck('id');
            if (!in_array($id, $pro->toArray())) {
                return redirect('/admin/product')->with('error','Not Found');
            } else {
                $product = Product::where('id', $id)->first();
                $product_categories = ProductCategory::where('created_by',Auth::user()->id)->get();

                return view('project.product.single', compact(
                    'product',
                    'product_categories'
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
        if (Auth::user()->roles[0]->id == 1) {
            $product = Product::where('id', $id)->first();
            $product_categories = ProductCategory::all();
            return view('project.product.edit', compact(
                'product',
                'product_categories'
            ));
        }
        else {
            $pro = Product::where('created_by',Auth::user()->id)->pluck('id');
            if (in_array($id, $pro->toArray())) {
                $product = Product::where('id', $id)->first();
                $product_categories = ProductCategory::all();
                return view('project.product.edit', compact(
                    'product',
                    'product_categories'
                ));
            }
            else {
                return redirect('/admin/product')->with('error','Not Found');
            }
        }
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
        $product = Product::where('id', $id)->first();
        $image = '';
        if($request->hasfile('product_image')){
            $image_array = $request->file('product_image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$image);
            // @unlink(public_path('project-assets\uploaded\images/') . $product->product_image);
        }

        Product::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_featured' => $request->is_featured,
            'on_sale' => $request->on_sale,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'product_image' => $image == "" ? $product->product_image : $image,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'status' => $request->status,
            'service_charges' => $request->service_charges,
            'brand' => $request->brand,
            'discount' => $request->discount,
            'total_amount' => $request->total_amount,
            'quantity' => $request->quantity,
            'sizes' => $request->sizes,
            'expire_date' => $request->expire_date,
        ]);
        return redirect('admin/product')->with('updated','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        // @unlink(public_path('project-assets\uploaded\images/') . $product->product_image);
        Product::where('id',$id)->delete();
        return redirect('/admin/product')->with('deleted','Deleted Successfully!');
    }

    //custom functions
    public function FeatureProducts()
    {
        if (Auth::user()->roles[0]->id == 1) {
            $items = Product::where('is_featured',1)->get();
            $items_total = Product::where('is_featured',1)->count();            
        } else {
            $items = Product::where('created_by',Auth::user()->id)->where('is_featured',1)->get();
            $items_total = Product::where('created_by',Auth::user()->id)->where('is_featured',1)->count();
        }
        
        return view('project.product.feature', compact('items', 'items_total'));
    }

    public function SaleProducts()
    {
        if (Auth::user()->roles[0]->id == 1) {
            $items = Product::where('on_sale',1)->get();
            $items_total = Product::where('on_sale',1)->count();            
        } else {
            $items = Product::where('created_by',Auth::user()->id)->where('on_sale',1)->get();
            $items_total = Product::where('created_by',Auth::user()->id)->where('on_sale',1)->count();
        }       

        return view('project.product.sale', compact('items','items_total'));   
    }

}
