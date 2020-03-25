<?php

namespace App\Http\Middleware;

use Closure;

use App\Http\Controllers\Auth;
class AdminMiddleware
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
        // return $next($request);
        if( !\Auth::user()->isAdmin()){
            return redirect('/');
        }
        // else if(\Auth::user()->isUser()){

        //     return redirect('/user/index');
        // }
        
    }
}
