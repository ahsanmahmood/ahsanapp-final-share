<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductCategory;

use App\User;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::all();

        if (Auth::user()->roles[0]->id == 1) {
            $items = ProductCategory::all();
            $items_total = ProductCategory::count();
        }
        else {
            $items = ProductCategory::where('created_by',Auth::user()->id)->get();
            $items_total = ProductCategory::where('created_by',Auth::user()->id)->count();
        }

        return view('project.product-category.index', compact(
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
        return view('project.product-category.create');
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

        $category_image = '';
        if($request->hasfile('category_image')){
            $image_array = $request->file('category_image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('\project-assets\uploaded\images/');
            $image_array->move($destination_path,$image);
        }

        ProductCategory::create([
            'created_by' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'category_image' => $image,
        ]);
        return redirect('admin/product-category')->with('added','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductCategory::where('id', $id)->first();
        $product_categories = ProductCategory::all();
        $user = User::where('id', $product->created_by)->first();
        $user_name = $user['name'];
        // dd($product);
        return view('project.product-category.single', compact(
            'product',
            'product_categories',
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
        $product = ProductCategory::where('id', $id)->first();
        $product_categories = ProductCategory::all();
        return view('project.product-category.edit', compact(
            'product',
            'product_categories'
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
        $product = ProductCategory::where('id', $id)->first();
        $image = '';
        if($request->hasfile('category_image')){
            $image_array = $request->file('category_image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$image);
            // @unlink(public_path('project-assets\uploaded\images/') . $product->category_image);
        }

        ProductCategory::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_image' => $image == "" ? $product->category_image : $image,
        ]);
        return redirect('admin/product-category')->with('updated','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductCategory::where('id',$id)->first();
        // @unlink(public_path('project-assets\uploaded\images/') . $product->product_image);
        ProductCategory::where('id',$id)->delete();
        return redirect('/admin/product-category')->with('deleted','Deleted Successfully!');
    }
}
