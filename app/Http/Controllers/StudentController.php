<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index(Request $request)
    {
      $user=DB::table('students')
              ->where('id',$request->session()->get('user_id'))->get();

      $posts=DB::table('post')->get();

      return view('student.index')->with('posts',$posts)
                          ->with('user',$user[0]);
    }

    public function allCourse(Request $request)
    {
        // return "string";
        $user=DB::table('students')
                ->where('id',$request->session()->get('user_id'))->get();

        $courses=DB::table('courses')->get();

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

        //print_r($user[0]);

        return view('student.course')->with('courses',$courses)
                                    ->with('user',$user[0])
                                    ->with('chapters',$chapters)
                                    ->with('instructors',$instructors);
    }

    public function popular(Request $request)
    {
      $user=DB::table('students')
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

      return view('student.popular')->with('popular',$popular)
                                    ->with('user',$user[0])
                                    ->with('instructor',$instructor)
                                    ->with('count',$count2)
                                    ->with('finish',$finish)
                                    ->with('rate',$rate);
    }

    public function searchCourse(Request $request, $id)
    {
        $id2 = $_GET['id'];

        $courses=DB::table('courses')
                    ->where('name','LIKE','%'.$id2.'%')->get();

        //print_r($user[0]);

        // $data = (object)['status'=>true];

        return $courses;
    }

    public function myCourse(Request $request)
    {
        // return "string";
        $user=DB::table('students')
                ->where('id',$request->session()->get('user_id'))->get();

        $taken=DB::table('courses_taken')
                    ->where('student_id',$request->session()->get('user_id'))->get();

        $courses = [];

        for ($i=0; $i < count($taken); $i++) {
          $courses[$i] = DB::table('courses')
                      ->where('course_id',$taken[$i]->course_id)->first();
        }

        $chapters = [];
        $complete = [];

        for ($i=0; $i < count($courses); $i++) {
          $chapter = DB::table('chapter_info')
                      ->where('course_id',$courses[$i]->course_id)->get();
          $chapters[$i] = count($chapter);

          $temp=0;
          for ($j=0; $j < count($chapter); $j++) {
            $quiz = DB::table('quiz_result')
                        ->where('chapter_id',$chapter[$j]->chapter_id)
                        ->where('student_id',$request->session()->get('user_id'))->get();
            if (count($quiz)>0) {
              $temp++;
              // print_r($quiz);
            }
          }
          if ($temp==0) {
            $complete[$i] = 0;
          }
          else {
            // print_r($temp);
            $complete[$i] = ($temp / count($chapter)) *100 ;
          }

        }

        //print_r($courses);

        return view('student.myCourse')->with('courses',$courses)
                                        ->with('user',$user[0])
                                        ->with('chapters',$chapters)
                                        ->with('complete',$complete);
    }

    public function showCourse(Request $request,$id)
    {
        $course=DB::table('courses')
                    ->where('course_id',$id)->get();
        $taken=DB::table('courses_taken')
                    ->where('course_id',$id)
                    ->where('student_id',$request->session()->get('user_id'))->get();

        $data = (object)['status'=>false];

        if (count($taken) > 0)
        {
          $data = (object)['status'=>true];
        }

        //print_r($data);


        $user=DB::table('students')
                ->where('id',$request->session()->get('user_id'))->get();

        return view('student.showCourse')->with('course',$course[0])
                            ->with('user',$user[0])
                            ->with('data',$data);
    }

    public function showCoursePost(Request $request)
    {
        $id = $request->src;
        // echo $id;

        $course=DB::table('courses')
                    ->where('name',$id)->get();
        $taken=DB::table('courses_taken')
                    ->where('course_id',$course[0]->course_id)
                    ->where('student_id',$request->session()->get('user_id'))->get();

        $data = (object)['status'=>false];

        if (count($taken) > 0)
        {
          $data = (object)['status'=>true];
        }

        //print_r($data);


        $user=DB::table('students')
                ->where('id',$request->session()->get('user_id'))->get();

        return view('student.showCourse')->with('course',$course[0])
                            ->with('user',$user[0])
                            ->with('data',$data);
    }

    public function chapter(Request $request,$id,$id2=null)
    {
        //echo "string";
        $course=DB::table('courses')
                    ->where('course_id',$id)->get();
        $chapters=DB::table('chapter_info')
                    ->where('course_id',$id)->get();

        $selectedChapter = [];
        if ($id2 == null) {
          $selectedChapter=DB::table('chapter_info')
                      ->where('chapter_id',$chapters[0]->chapter_id)->get();
        }
        else {
          $selectedChapter=DB::table('chapter_info')
                      ->where('chapter_id',$id2)->get();
        }

        $user=DB::table('students')
                ->where('id',$request->session()->get('user_id'))->get();

        return view('student.chapter')->with('course',$course[0])
                                        ->with('chapters',$chapters)
                                        ->with('selectedChapter',(object)$selectedChapter[0])
                                        ->with('user',$user[0]);
    }

    public function enroll(Request $request,$id)
    {
        DB::table('courses_taken')->insert(['course_id' => $id, 'student_id' => $request->session()->get('user_id'),'status' => "running"]);
        //echo "inserted";

        return redirect()->route('student.chapter',[$id,1]);
    }

    public function quiz(Request $request, $id)
    {

        $chapter=DB::table('chapter_info')
                    ->where('chapter_id',$id)->get();
        $course=DB::table('courses')
                    ->where('course_id',$chapter[0]->course_id)->get();
        $quiz=DB::table('quiz')
                    ->where('chapter_id',$id)->get();
        $user=DB::table('students')
                ->where('id',$request->session()->get('user_id'))->get();

        $taken=DB::table('quiz_result')
                    ->where('chapter_id',$id)
                    ->where('student_id',$request->session()->get('user_id'))->get();

        $data = (object)['status'=>false];

        if (count($taken) > 0)
        {
          $data = (object)['status'=>true];
        }

        return view('student.quiz')->with('course',$course[0])
                                    ->with('chapter',$chapter[0])
                                    ->with('quiz',$quiz)
                                    ->with('user',$user[0])
                                    ->with('data',$data);
    }

    public function storeResult(Request $request, $id)
    {
      $id2 = $_GET['id'];
      $array = explode("|",$id2);

      DB::table('quiz_result')->insert(['chapter_id' => $array[0], 'student_id' => $request->session()->get('user_id'),'score' => $array[1]]);
      return $array[1];
    }

    public function share(Request $request, $id)
    {
      $array = explode("|",$id);

      // echo $array[1];

      $chapter=DB::table('chapter_info')
                  ->where('chapter_id',$array[0])->get();
      $course=DB::table('courses')
                  ->where('course_id',$chapter[0]->course_id)->get();
      $user=DB::table('students')
              ->where('id',$request->session()->get('user_id'))->get();

      $string = "I have scored ".$array[1]." on ".$chapter[0]->name." of ".$course[0]->name;

      // echo $string;

      DB::table('post')->insert(['user_id' => $request->session()->get('user_id'), 'user_name' => $user[0]->name,'text' => $string]);
      // return $array[1];

      return redirect()->route('student.chapter',[$chapter[0]->course_id, $array[0]]);
    }

    public function profile(Request $request)
    {
      $user=DB::table('students')
              ->where('id',$request->session()->get('user_id'))->get();


      $temp=DB::table('courses_taken')
              ->where('student_id',$request->session()->get('user_id'))->get();

      $data = (object)['course'=>count($temp)];

        return view('student.profile')->with('user',$user[0])
                                      ->with('data',$data);
    }

    public function editInfo(Request $request)
    {
      if($request->name=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Name can not be empty');
         return redirect()->route('student.profile');
       }
       else if(strpbrk($request->name , '1234567890') !== false)
       {
        $request->session()->flash('msg','Name can not contain numbers');
         return redirect()->route('student.profile');
       }
       else if($request->email=="")
       {
         //EMPTY:::::::::::::::;
        $request->session()->flash('msg','Email can not be empty');
         return redirect()->route('student.profile');
       }
       else if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
       {
        $request->session()->flash('msg','Invalid Email');
         return redirect()->route('student.profile');
       }
       else {
         DB::table('students')
            ->where('id', $request->session()->get('user_id'))
            ->update(['name' => $request->name, 'email' => $request->email]);

        $request->session()->flash('msg','Information updated successfully');
         return redirect()->route('student.profile');
       }
    }

    public function editPass(Request $request)
    {
      $user=DB::table('students')
              ->where('id',$request->session()->get('user_id'))->get();


      if($request->current=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Current password can not be empty');
         return redirect()->route('student.profile');
       }
       else if($request->current!=$user[0]->password)
        {
          $request->session()->flash('msg','Current password does not match');
          return redirect()->route('student.profile');
        }
        else if($request->new=="")
         {
           //EMPTY:::::::::::::::;
           $request->session()->flash('msg','New password can not be empty');
           return redirect()->route('student.profile');
         }
        else if(strlen($request->new) <4)
       	{
          $request->session()->flash('msg','New Password length must be at least 4');
       		return redirect()->route('student.profile');
       	}
        else {
          DB::table('students')
             ->where('id', $request->session()->get('user_id'))
             ->update(['password' => $request->new]);

         DB::table('login')
            ->where('id', $request->session()->get('user_id'))
            ->update(['password' => $request->new]);

         $request->session()->flash('msg','Password updated successfully');
          return redirect()->route('student.profile');
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
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
