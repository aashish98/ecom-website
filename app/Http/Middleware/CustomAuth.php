<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CustomAuth
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
        $path = $request->path();
        if(($path=='signin' || $path=='signup') && (Session::get('user') || Session::get('admin')))
        {
            return redirect('/');
        }
        else if(($path=='about' || $path=='cart' || $path=='contact'|| $path=='messages' || $path=='messageList')&& (!Session::get('user')))
        {
            return redirect('signin');
        }
        return $next($request);
    }
   
}
