<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//to use the User Model Class
use App\User;
//for Query Builder
use Illuminate\Support\Facades\DB;


class loginController extends Controller
{
    public function index(Request $request)
    {
      $error = (object) ['status'=>1];

     return view('login')
                 ->with('error',$error);
    }
    public function verify(Request $request)
    {
    	$un=$request->userid;
    	$pw=$request->password;

    	$user=DB::table('login')
				->where('id',$un)
				->where('password',$pw)
				->first();

    	if($user!=null)
    	{
    		$request->session()->put('user_id',$user->id);

        if ($user->type == 'admin') {
          $request->session()->put('type',1);
          return redirect()->route('admin.index');
        }
        else if ($user->type == 'student') {
          $request->session()->put('type',2);
          return redirect()->route('student.index');
        }
        else{
          $request->session()->put('type',3);
          return redirect()->route('instructor.index');
        }
    	}
    	else
    	{
    		$request->session()->flash('logmsg','Invalid User ID or Password');
    		return redirect()->route('login.index');
    	}
    }
}
