<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\Role;
use App\Models\UserDetails;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['unique:users']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($data->user_role === 'rider') {
            $user->roles()->attach(Role::where('name', 'Rider')->first());
        }
        elseif($data->user_role === 'customer') {
            $user->roles()->attach(Role::where('name', 'Customer')->first());
        }
        elseif($data->user_role === 'service_provider') {
            $user->roles()->attach(Role::where('name', 'Service Provider')->first());
        }
        else {
            $user->roles()->attach(Role::where('name', 'Customer')->first());
        }
        UserDetails::create([
            'user_id' => $user->id,
            'profile_image' => 'user.png'
        ]);
        // return redirect('/')->with('signup_success','You have Successfully Signed Up!');
        return $user;
    }

    public function registerApi(Request $request)
    {
        // dd($request->toArray());
        $validator = $this->validator($request->toArray());
        // dd($validator->fails());
        if ($validator->fails()) {
            return response()->json([
                'error' => "Email Exists"
            ]);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->user_role === 'rider') {
            $user->roles()->attach(Role::where('name', 'Rider')->first());
        }
        elseif($request->user_role === 'customer') {
            $user->roles()->attach(Role::where('name', 'Customer')->first());
        }
        elseif($request->user_role === 'service_provider') {
            $user->roles()->attach(Role::where('name', 'Service Provider')->first());
        }
        else {
            $user->roles()->attach(Role::where('name', 'Customer')->first());
        }
        UserDetails::create([
            'user_id' => $user->id,
            'profile_image' => 'user.png',
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'location' => $request->location,
            'phone_number' => $request->phone_number
        ]);
        $user->setToken();
        $user->setTokenExpireDate();
        $new_user = User::where('id', $user->id)->with('user_details')->with('roles')->first();
        return response()->json([
            'data' => $new_user->toArray()
        ]);
    }
}
