<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // check if user is loged in
        if ($request->user() === null) {
            return redirect('/login')->with('login_user_require','You are not allowed to access that content, (Kindly Login/Register To Proceed).');
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        // now check if user have specific roles (also check if path is secure or not)
        if ($request->user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }

        // redirect user back if dont have any role required to access that url
        return redirect('/')->with('wronguser','You are not allowed to access that content.');
        
    }
}
