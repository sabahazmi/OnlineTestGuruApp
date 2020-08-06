<?php

namespace App\Http\Middleware;

use Closure;

class StudentMiddleware
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

        if (($request->user() && ($request->user()->role->slug != "student")) ||(!$request->user()))
            // ($request->user() && $request->user()->role->slug != "student")
        {
            return response()->view('unauthorized',array('role'=>"Student"), 200);
        }
        return $next($request);
    }
}
