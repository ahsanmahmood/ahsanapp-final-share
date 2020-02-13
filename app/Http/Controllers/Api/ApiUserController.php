<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\UserDetails;
class ApiUserController extends Controller
{
    public function getUserData(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
    	$item = User::where('id', $request->user_id)->with('user_details')->with('roles')->first();
    	if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {
    		return response()->json(['data' => $item]);
    	} else {
    		return response()->json(['error' => "Token Not Valid"]);
    	}
    }

    public function editUserData(Request $request)
    {
        $api_tokens = User::pluck('api_token')->toArray();
    	$item = User::where('id', $request->user_id)->with('user_details')->with('roles')->first();
    	if (in_array($request->api_token, $api_tokens) && $request->api_token != null) {

    		$image = '';
	        if($request->hasfile('profile_image')){
	            $image_array = $request->file('profile_image');
	            $image_ext = $image_array->getClientOriginalExtension();
	            $image = "img_".rand(123456,999999).".".$image_ext;
	            $destination_path = public_path('/project-assets/uploaded/images/');
	            $image_array->move($destination_path,$image);
	            // @unlink(public_path('project-assets\uploaded\images/') . $product->profile_image);
	        }

            $cnic_front_pic = '';
            if($request->hasfile('cnic_front')){
                $image_array = $request->file('cnic_front');
                $image_ext = $image_array->getClientOriginalExtension();
                $cnic_front_pic = "img_".rand(123456,999999).".".$image_ext;
                $destination_path = public_path('/project-assets/uploaded/images/');
                $image_array->move($destination_path,$cnic_front_pic);
                // @unlink(public_path('project-assets\uploaded\images/') . $product->profile_image);
            }

            $cnic_back_pic = '';
            if($request->hasfile('cnic_back')){
                $image_array = $request->file('cnic_back');
                $image_ext = $image_array->getClientOriginalExtension();
                $cnic_back_pic = "img_".rand(123456,999999).".".$image_ext;
                $destination_path = public_path('/project-assets/uploaded/images/');
                $image_array->move($destination_path,$cnic_back_pic);
                // @unlink(public_path('project-assets\uploaded\images/') . $product->profile_image);
            }

    		UserDetails::where('user_id', $request->user_id)->update([
    			'first_name' => $request->first_name,
    			'last_name' => $request->last_name,
    			'phone_number' => $request->phone_number,
    			'address' => $request->address,
    			'cnic' => $request->cnic,
    			'profile_image' => $image == "" ? $item->profile_image : $image,
    			'location' => $request->location,
    			'city' => $request->city,
                'cnic_front' => $cnic_front_pic == "" ? $item->cnic_front : $cnic_front_pic,
                'cnic_back' => $cnic_back_pic == "" ? $item->cnic_back : $cnic_back_pic,
    			'latitude' => $request->latitude,
    			'longitude' => $request->longitude,
    			'skills' => $request->skills,
    			'occupation' => $request->occupation,
    			'user_type' => $request->user_type
    		]);
    		$item = User::where('id', $request->user_id)->with('user_details')->with('roles')->first();
    		return response()->json(['data' => $item]);
    	} else {
    		return response()->json(['error' => "Token Not Valid"]);
    	}
    }
}
