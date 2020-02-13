<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Role;

class RoleController extends Controller
{
    
    public function CheckRole()
    {
    	$users = User::all();
    	return view('project.user-role.index',[
    		'users' => $users,
    	]);
    }

    public function assignRole(Request $request)
    {
    	$user = User::where('email', $request['email'])->first();
    	// dd($user->toArray());
    	$user->roles()->detach();
    	if ($request['super_admin']) {
    		$user->roles()->attach(Role::where('name', 'Super Admin')->first());
    	}
    	if ($request['admin']) {
    		$user->roles()->attach(Role::where('name', 'Admin')->first());
    	}
    	if ($request['rider']) {
    		$user->roles()->attach(Role::where('name', 'Rider')->first());
    	}
        if ($request['customer']) {
            $user->roles()->attach(Role::where('name', 'Customer')->first());
        }
    	if ($request['service_provider']) {
    		$user->roles()->attach(Role::where('name', 'Service Provider')->first());
    	}
    	return redirect()->back()->with('roleassigned','Role Assigned Successfully to user!');
    }

}
