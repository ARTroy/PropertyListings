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
	    if ( !is_object(Auth::user()) || !Auth::user()->admin || !Auth::guard($guard)->check() ) {
	        return redirect('/');
	    }

	    return $next($request);
	}
}