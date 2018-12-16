<?php

namespace App\Http\Middleware;

use Closure;

class StudentVerification
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
      if($request->session()->get('type')==2)
      {
          return $next($request);
      }
      else if ($request->session()->get('type')==1) {
          return redirect()->route('admin.index');
      }
      else {
        return redirect()->route('instructor.index');
      }
    }
}
