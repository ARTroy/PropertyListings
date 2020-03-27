<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'admin')
	{	//!Auth::guard($guard)->check()
	    if ( Auth::check() && is_object(Auth::user())) {
	    	if(!Auth::user()->admin){
	    		 return redirect('/')->withErrors('You need greater permissions to view this area');
	    	}
	    } else {
	    	return redirect('/')->withErrors('You need to be logged in to view this page.');
	    }

	    return $next($request);
	}
}