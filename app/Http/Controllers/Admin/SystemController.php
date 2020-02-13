<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\GoogleMap;

use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
    
    public function showDashborad()
    {
        if (Auth::user()->roles[0]->id == 1) {
            // Users Data
            $total_users = User::count();
            $admins = 0;
            $riders = 0;
            $customers = 0;
            $service_providers = 0;
            $users_c = User::with('roles')->get();
            foreach ($users_c as $user) {
                if ($user->roles[0]->id === 2) {
                    $admins++;
                }
                if ($user->roles[0]->id === 3) {
                    $riders++;
                }
                if ($user->roles[0]->id === 4) {
                    $customers++;
                }
                if ($user->roles[0]->id === 5) {
                    $service_providers++;
                }
            }

            // Product Data
            $total_products = Product::count();
            $feature_products = 0;
            $sale_products = 0;
            $products = Product::all();
            foreach ($products as $product) {
                if ($product->is_featured == 1) {
                    $feature_products++;
                }
                if ($product->on_sale == 1) {
                    $sale_products++;
                }
            }

            // Product Categories
            $total_p_c = ProductCategory::count();
        } else {
            // Users Data
            $total_users = User::where('created_by',Auth::user()->id)->count();
            $admins = 0;
            $riders = 0;
            $customers = 0;
            $users_c = User::where('created_by',Auth::user()->id)->with('roles')->get();
            foreach ($users_c as $user) {
                if ($user->roles[0]->id === 2) {
                    $admins++;
                }
                if ($user->roles[0]->id === 3) {
                    $riders++;
                }
                if ($user->roles[0]->id === 4) {
                    $customers++;
                }
            }

            // Product Data
            $total_products = Product::where('created_by',Auth::user()->id)->count();
            $feature_products = 0;
            $sale_products = 0;
            $products = Product::where('created_by',Auth::user()->id)->get();
            foreach ($products as $product) {
                if ($product->is_featured == 1) {
                    $feature_products++;
                }
                if ($product->on_sale == 1) {
                    $sale_products++;
                }
            }

            // Product Categories
            $total_p_c = ProductCategory::where('created_by',Auth::user()->id)->count();
        }
        
        return view('project.dashborad.index', compact(
            'total_users',
            'admins',
            'riders',
            'customers',
            'service_providers',
            'total_products',
            'feature_products',
            'sale_products',
            'total_p_c'
        ));
    }

    public function setGoogleMapPoint(Request $request)
    {
        // dd($request->toArray(), 'points');
        GoogleMap::where('id', 1)->update([
            'lat' => $request->lat,
            'long' => $request->long
        ]);
        return redirect('admin/google-map')->with('updated', "Updated Successfully");
    }

    public function setGoogleMapPointDistance(Request $request)
    {
        // dd($request->toArray(), 'distance');
        GoogleMap::where('id', 1)->update([
            'distance' => $request->distance
        ]);
        return redirect('admin/google-map')->with('updated', "Updated Successfully");
    }

}
