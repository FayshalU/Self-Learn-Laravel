<?php

namespace App\Http\Middleware;

use Closure;

class UserTypeVerification
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
          return redirect()->route('admin.index');
      }
      else if ($request->session()->get('type')==2) {
          return redirect()->route('student.index');
      }
      else if ($request->session()->get('type')==3){
        return redirect()->route('instructor.index');
      }
      else {
        return $next($request);
      }
    }
}
