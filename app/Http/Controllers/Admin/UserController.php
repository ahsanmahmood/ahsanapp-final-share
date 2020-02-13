<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\UserDetails;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_details = UserDetails::all();
        if (Auth::user()->roles[0]->id == 1) {
            $users = User::all();
            $users_total = User::count();
        }
        else {
            $users = User::where('created_by',Auth::user()->id)->get();            
            $users_total = User::where('created_by',Auth::user()->id)->count();
        }
        return view('project.users.index', compact(
            'users',
            'users_total',
            'users_details'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.users.create');
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

        $image_pic = '';
        if($request->hasfile('image')){
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image_pic = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$image_pic);
        };

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by' => Auth::user()->roles[0]->id
        ]);
        $role_admin = Role::where('name', 'Admin')->first();
        $user->roles()->attach($role_admin);
        UserDetails::create([
            'user_id' => $user->id,
            'location' => $request->location,
            'cnic' => $request->cnic,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'profile_image' => $image_pic,
        ]);
        return redirect('admin/users/')->with('added','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        if (Auth::user()->roles[0]->id == 1) {
            $user = User::where('id',$id)->with('user_details')->first();
            return view('project.users.single_user',compact('user'));
        }
        else {
            $users_add = User::where('created_by',Auth::user()->id)->pluck('id');
            // dd($users_add->toArray());
            if (in_array($id, $users_add->toArray())) {
                $user = User::where('id',$id)->with('user_details')->first();
                return view('project.users.single_user',compact('user'));
            } else {
                return redirect('/admin/users')->with('error','User Not Found');
            }
            
        }
        // dd($user->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->with('user_details')->first();
        // dd($user->toArray());
        return view('project.users.edit',compact('user'));
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

        $user_details = UserDetails::where('user_id', $id)->first();
        // dd($request->toArray(),$id);
        if (Auth::user()->roles[0]->id === 1) {
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => $request->is_active,
            ]);
        }

        $profile_image = '';
        if($request->hasfile('profile_image')){
            $image_array = $request->file('profile_image');
            $image_ext = $image_array->getClientOriginalExtension();
            $profile_image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path,$profile_image);
            // @unlink(public_path('project-assets\uploaded\images/') . $user_details->profile_image);
        }

        UserDetails::where('user_id',$id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'cnic' => $request->cnic,
            'profile_image' => ($profile_image == "" ? $user_details->profile_image : $profile_image),
            'location' => $request->location,
            'city' => $request->city,
            'skills' => $request->skills,
            'occupation' => $request->occupation,
            'user_type' => $request->user_type,
        ]);

        return redirect('admin/users/'.$id)->with('updated','Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        UserDetails::where('user_id',$id)->delete();
        return redirect('/admin/users')->with('deleted','Deleted Successfully!');
    }

    // Custom Functions

    // Admins Users
    public function AdminUsers()
    {
        // condition is in blade template
        if (Auth::user()->roles[0]->id == 1) {
            $users = User::all();
        }
        else {
            $users = User::where('created_by',Auth::user()->id)->get();
        }
        return view('project.users.admins', compact(
            'users'
        ));
    }

    // Rider Users
    public function RiderUsers()
    {
        // condition is in blade template
        if (Auth::user()->roles[0]->id == 1) {
            $items = User::all();
        }
        else {
            $items = User::where('created_by',Auth::user()->id)->get();
        }
        return view('project.users.riders', compact(
            'items'
        ));
    }

    // CustomerUsers
    public function CustomerUsers()
    {
        // condition is in blade template
        if (Auth::user()->roles[0]->id == 1) {
            $items = User::all();
        }
        else {
            $items = User::where('created_by',Auth::user()->id)->get();
        }
        return view('project.users.customers', compact(
            'items'
        ));
    }

    // ServiceProvider Users
    public function ServiceProviderUsers()
    {
        // condition is in blade template
        if (Auth::user()->roles[0]->id == 1) {
            $items = User::all();
        }
        else {
            $items = User::where('created_by',Auth::user()->id)->get();
        }
        return view('project.users.service-providers', compact(
            'items'
        ));
    }


    // Banned Users 
    public function BannedUsers()
    {
        // condition is in blade template
        if (Auth::user()->roles[0]->id == 1) {
            $users = User::all();
        }
        else {
            $users = User::where('created_by',Auth::user()->id)->get();
        }
        return view('project.users.banned', compact(
            'users'
        ));
    }

    // Ban User
    public function BanUser($id)
    {
        $user = User::where('id',$id)->update([
            'is_active' => 0,
        ]);
        return redirect('/admin/users/banned')->with('user_banned','User Banned Successfuly!');
    }

    // UnBan User
    public function UnBanUser($id)
    {
        $user = User::where('id',$id)->update([
            'is_active' => 1,
        ]);
        return redirect('/admin/users')->with('user_unbanned','User Unbanned Successfuly!');
    }
}
