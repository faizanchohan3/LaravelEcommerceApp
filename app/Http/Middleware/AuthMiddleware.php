<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()){
        if(Auth::user()->hasRole('admin')){


            return $next($request);
        }
        else
    {
        return response()->json(['status'=>400,'message'=>'user not logged in or not admin']);
    }
}else{

    return redirect('/login');
}

    }
}
