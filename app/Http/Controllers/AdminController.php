<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();

      $post=DB::table('post')->get();

      $data = [];
      for ($i=0; $i < count($post); $i++) {
        $temp=DB::table('students')
                ->where('id',$post[$i]->user_id)->first();
        $data[$i] = $temp;
      }

      return view('admin.index')->with('post',$post)
                          ->with('user',$user[0])
                          ->with('data',$data);
    }

    public function showInstructors(Request $request){

        $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();

         $instructors = DB::table('instructors')
                        ->get();

        $data = [];

        for ($i=0; $i < count($instructors); $i++) {
          $temp=DB::table('courses')
                  ->where('instructor_id',$instructors[$i]->id)->get();

          $data[$i] = count($temp);
        }

        return view('admin.instructor')->with('instructors',$instructors)
                                    ->with('user',$user[0])
                                    ->with('data',$data);
    }

    public function showStudents(Request $request){

        $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();

         $students = DB::table('students')
                        ->get();

        $data = [];

        for ($i=0; $i < count($students); $i++) {
          $temp=DB::table('courses_taken')
                  ->where('student_id',$students[$i]->id)->get();

          $data[$i] = count($temp);
        }

        return view('admin.student')
                                    ->with('students',$students)
                                    ->with('user',$user[0])
                                    ->with('data',$data);
    }

    public function showCourses(Request $request)
    {

      $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();

      $courses = DB::table('courses')
                        ->get();

        $chapters = [];

        for ($i=0; $i < count($courses); $i++) {
          $chapter = DB::table('chapter_info')
                      ->where('course_id',$courses[$i]->course_id)->get();
          $chapters[$i] = count($chapter);
        }

        $instructors = [];

        for ($i=0; $i < count($courses); $i++) {
          $instructor = DB::table('instructors')
                      ->where('id',$courses[$i]->instructor_id)->first();
          if ($instructor!=null) {
            $instructors[$i] = $instructor->name;
          }
          else {
            $instructors[$i] = null;
          }

        }

        return view('admin.showCourses')
                                    ->with('courses',$courses)
                                    ->with('user',$user[0])
                                    ->with('chapters',$chapters)
                                    ->with('instructors',$instructors);

    }

    public function popular(Request $request)
    {
      // echo "string";
      $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();

      $courses=DB::table('courses')->get();

      $length = count($courses);

      $count = [];
      for ($i=0; $i < $length; $i++) {
        $temp = DB::table('courses_taken')
                    ->where('course_id',$courses[$i]->course_id)->get();
        $count[$i] = count($temp);
      }

      $count2 = $count;
      rsort($count2);
      // print_r($count2);

      $popular = [];
      $check = [];
      for ($i=0; $i <$length ; $i++) {
        for ($j=0; $j <$length ; $j++) {
          if (($count2[$i] == $count[$j]) && (!in_array($j, $check)) ) {
              $popular[$i] = $courses[$j];
              $check[$i] = $j;
              break;
          }
        }
      }

      // print_r($popular);

      $instructor = [];
      for ($i=0; $i < $length; $i++) {
        $instructor[$i] = DB::table('instructors')
                              ->where('id',$popular[$i]->instructor_id)->first();
      }

      // print_r($instructor[0][0]->name);

      $finish = [];
      for ($i=0; $i < $length; $i++) {
        $temp = DB::table('courses_taken')
                    ->where('course_id',$popular[$i]->course_id)
                    ->where('status',"finished")->get();
        $finish[$i] = count($temp);
      }

      $rate = [];
      for ($i=0; $i < $length; $i++) {

        if ($count2[$i] != 0) {
          $rate[$i] = ($finish[$i] / $count2[$i]) * 100;
        }
        else {
          $rate[$i] = 0;
        }


      }

      return view('admin.popular')->with('popular',$popular)
                                    ->with('user',$user[0])
                                    ->with('instructor',$instructor)
                                    ->with('count',$count2)
                                    ->with('finish',$finish)
                                    ->with('rate',$rate);
    }


    public function deleteCourses(Request $request,$id)
    {
       $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();

        $course=DB::table('courses')
                    ->where('course_id',$id)->get();


        return view('admin.deleteCourses')->with('course',$course[0])
                                              ->with('user',$user[0]);
    }

    public function deleteCoursePost(Request $request)
    {
        $id = $request->id;

        if (isset($_POST['yes'])) {
          DB::table('courses')->where('course_id', $id)->delete();
          return redirect()->route('admin.showCourses');
        }
        else {
          return redirect()->route('admin.showCourses');
        }

    }

    public function deleteInstructor(Request $request,$id)
    {
       $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();

        $instructor=DB::table('instructors')
                    ->where('id',$id)->get();


        return view('admin.deleteInstructor')->with('instructor',$instructor[0])
                                              ->with('user',$user[0]);
    }

    public function deleteInstructorPost(Request $request)
    {
        $id = $request->id;

        if (isset($_POST['yes'])) {
          DB::table('instructors')->where('id', $id)->delete();
          DB::table('login')->where('id', $id)->delete();
          return redirect()->route('admin.showInstructors');
        }
        else {
          return redirect()->route('admin.showInstructors');
        }

    }

    public function deleteStudent(Request $request,$id)
    {
       $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();

        $students=DB::table('students')
                    ->where('id',$id)->get();


        return view('admin.deleteStudent')->with('students',$students[0])
                                              ->with('user',$user[0]);
    }

    public function deleteStudentPost(Request $request)
    {
        $id = $request->id;

        if (isset($_POST['yes'])) {
          DB::table('students')->where('id', $id)->delete();
          DB::table('login')->where('id', $id)->delete();
          return redirect()->route('admin.showStudents');
        }
        else {
          return redirect()->route('admin.showStudents');
        }

    }

    public function profile(Request $request)
    {
      $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();


      $temp=DB::table('courses')
              ->where('instructor_id',$request->session()->get('user_id'))->get();

      $data = (object)['course'=>count($temp)];

        return view('admin.profile')->with('user',$user[0])
                                          ->with('data',$data);
    }

    public function editInfo(Request $request)
    {
      if($request->name=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Name can not be empty');
         return redirect()->route('admin.profile');
       }
       else if(strpbrk($request->name , '1234567890') !== false)
       {
        $request->session()->flash('msg','Name can not contain numbers');
         return redirect()->route('admin.profile');
       }
       else if($request->email=="")
       {
         //EMPTY:::::::::::::::;
        $request->session()->flash('msg','Email can not be empty');
         return redirect()->route('admin.profile');
       }
       else if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
       {
        $request->session()->flash('msg','Invalid Email');
         return redirect()->route('admin.profile');
       }
       else {
         DB::table('admins')
            ->where('id', $request->session()->get('user_id'))
            ->update(['name' => $request->name, 'email' => $request->email]);

        $request->session()->flash('msg','Information updated successfully');
         return redirect()->route('admin.profile');
       }
    }

    public function editPass(Request $request)
    {
      $user=DB::table('admins')
              ->where('id',$request->session()->get('user_id'))->get();


      if($request->current=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Current password can not be empty');
         return redirect()->route('admin.profile');
       }
       else if($request->current!=$user[0]->password)
        {
          $request->session()->flash('msg','Current password does not match');
          return redirect()->route('admin.profile');
        }
        else if($request->new=="")
         {
           //EMPTY:::::::::::::::;
           $request->session()->flash('msg','New password can not be empty');
           return redirect()->route('admin.profile');
         }
        else if(strlen($request->new) <4)
        {
          $request->session()->flash('msg','New Password length must be at least 4');
            return redirect()->route('admin.profile');
        }
        else {
          DB::table('admins')
             ->where('id', $request->session()->get('user_id'))
             ->update(['password' => $request->new]);

         DB::table('login')
            ->where('id', $request->session()->get('user_id'))
            ->update(['password' => $request->new]);

         $request->session()->flash('msg','Password updated successfully');
          return redirect()->route('admin.profile');
        }

    }



    // public function showInstructors()
    // {
    //     return view('admin.instructor');
    // }



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
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
