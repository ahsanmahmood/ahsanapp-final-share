<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Service;
use App\Models\ServiceCategory;

class ApiServiceController extends Controller
{
    
	public function addApiService(Request $request)
	{
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
    		$new_image = '';
            if($request->hasfile('image')){
                $image_array = $request->file('image');
                $image_ext = $image_array->getClientOriginalExtension();
                $new_image = "img_".rand(123456,999999).".".$image_ext;
                $destination_path = public_path('/project-assets/uploaded/images/');
                $image_array->move($destination_path,$new_image);
            }
            Service::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'time' => $request->time,
                'image' => $new_image,
                'price' => $request->price,
                'location' => $request->location,
                'extra_field' => $request->extra_field
            ]);
            return response()->json(['data' => 'Service Added'], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
	}

    public function getUserServices(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $items = Service::where('user_id', $request->id)->get();
            return response()->json(['data' => $items->toArray()], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

    public function allServicesInSystem(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $items = Service::latest()->get();
            return response()->json(['data' => $items->toArray()], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

    public function allServicesCategories(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
        if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
            $items = ServiceCategory::latest()->get();
            return response()->json(['data' => $items->toArray()], 200);
        } else {
            return response()->json(['error' => "Token Not Valid"], 200);
        }
    }

}