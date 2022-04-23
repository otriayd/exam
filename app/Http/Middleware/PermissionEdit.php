<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionEdit
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
		  $user_id = Auth::user()->id;
		  if(Auth::user()->hasRole('admin') || $user_id == $request->id){
			  return $next($request);
		  }else{
			  return redirect(route('home'));
		  }
    }
}