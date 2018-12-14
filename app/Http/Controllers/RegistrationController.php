<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
       $error = (object) ['status'=>2];

     	return view('login')
                  ->with('error',$error);
     }

     public function verify(Request $request)
     {

       if($request->name=="")
       	{
       		//EMPTY:::::::::::::::;
          $request->session()->flash('regmsg','Name can not be empty');
       		return redirect()->route('register.index');
       	}
        else if(strpbrk($request->name , '1234567890') !== false)
      	{
         $request->session()->flash('regmsg','Name can not contain numbers');
      		return redirect()->route('register.index');
      	}
        else if($request->userid=="")
      	{
      		//EMPTY:::::::::::::::;
         $request->session()->flash('regmsg','User ID can not be empty');
      		return redirect()->route('register.index');
      	}
        else if($request->email=="")
      	{
      		//EMPTY:::::::::::::::;
         $request->session()->flash('regmsg','Email can not be empty');
      		return redirect()->route('register.index');
      	}
        else if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
      	{
         $request->session()->flash('regmsg','Invalid Email');
      		return redirect()->route('register.index');
      	}

        else if($request->password=="")
      	{
      		//EMPTY:::::::::::::::;
         $request->session()->flash('regmsg','Password can not be empty');
      		return redirect()->route('register.index');
      	}

        else if(strlen($request->password) <4)
      	{
         $request->session()->flash('regmsg','Password length must be at least 4');
      		return redirect()->route('register.index');
      	}

        else if($request->type=="type")
      	{
         $request->session()->flash('regmsg','Please select Type');
      		return redirect()->route('register.index');
      	}
        else {
          $user=DB::table('login')
    				->where('id',$request->userid)
    				->first();

          if($user!=null)
          {
            $request->session()->flash('regmsg','User ID is already taken');
         		return redirect()->route('register.index');
          }
          else {
            $date = Carbon::now();
            DB::table('login')->insert(['id' => $request->userid, 'password' => $request->password,'type' => $request->type]);

            if ($request->type == "student") {
              DB::table('students')->insert(['id' => $request->userid, 'name' => $request->name,'email' => $request->email, 'password' => $request->password, 'joined' => $date]);

              $request->session()->put('user_id',$request->userid);
              return redirect()->route('student.index');
            }
            else {
              DB::table('instructors')->insert(['id' => $request->userid, 'name' => $request->name,'email' => $request->email, 'password' => $request->password, 'joined' => $date]);

              $request->session()->put('user_id',$request->userid);
              return redirect()->route('instructor.index');
            }

            //echo "Inserted";
          }
        }

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
