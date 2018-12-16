<?php

namespace App\Http\Middleware;

use Closure;

class AdminVerification
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
      if($request->session()->get('type')==1)
      {
          return $next($request);
      }
      else if ($request->session()->get('type')==2) {
          return redirect()->route('student.index');
      }
      else {
        return redirect()->route('instructor.index');
      }

    }
}
