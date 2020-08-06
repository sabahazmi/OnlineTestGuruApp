<?php

namespace App\Http\Middleware;

use Closure;

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
         //return new Response ($request->user()->role->slug);
        // if ($request->user() && $request->user()->role->slug == "instructor")
        // {
        //      return redirect('instructor/dashboard');
        // }else if($request->user() && $request->user()->role->slug == "student") {
        //     return redirect('/course');
        // }

        if (($request->user() && ($request->user()->role->slug != "admin")) || (!$request->user()))
        {
            return redirect('login')->with('status', 'You need to login first!');;
            // return response()->view('unauthorized',array('role'=>"Admin"), 200);
        }
        return $next($request);
    }
}
