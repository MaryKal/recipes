<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
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
        
     
            // if (\Auth::user()->isBlocked()) { 
            //     $message = 'Your account has been blocked.';
                  
            //     return auth()->logout()->with($message);
            //     // return 'хуй';
             
            // }else{
            //     return redirect('/user/index');
            // }
            return $next($request);
            
        
    }
        // if(\Auth::user()->isUser() ){
        //     if(\Auth::user()->isBlocked()){

        //         return 'Your account has been blocked';
        //     }else{
        //         return redirect('/user/index');
        //     }

          
        // }
//         // return $next($request);
//     }
}
