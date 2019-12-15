<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        // authenticat if the user is Admin (user_id == 1)
        if ($request->id != 1) {
          return redirect('/')->with('error', 'Unauthorized User');
        }
        return $next($request);
    }
}
