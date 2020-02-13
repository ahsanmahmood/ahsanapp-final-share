<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }


    protected function credentials(Request $request)
    {
        $cre = $request->only($this->username(), 'password');
        $cre['is_active'] = 1;
        return $cre;
    }

    public function loginApi(Request $request)
    {
        $this->validateLogin($request);
        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->setToken();
            $user->setTokenExpireDate();
            $new_user = User::where('id',$user->id)->with('user_details')->with('roles')->first();
            // dd($new_user);
            return response()->json([
                'data' => $new_user->toArray()
            ]);
        }
        return response()->json([
            'error' => "Invalid Data"
        ]);
    }

    public function logoutApi(Request $request)
    {
        $user = Auth::guard('api')->user();
        // dd($request->toArray());
        $user = User::where('id', $request->id)->first();
        $user->api_token = null;
        $user->api_token_expireIn = null;
        $user->remember_token = null;
        $user->save();
        return response()->json(['data' => 'User logged out.'], 200);
    }

}
