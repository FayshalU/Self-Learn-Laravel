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

        //print_r($user[0]);

        return view('student.course')->with('courses',$courses)
                                    ->with('user',$user[0])
                                    ->with('chapters',$chapters);
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

        for ($i=0; $i < count($courses); $i++) {
          $chapter = DB::table('chapter_info')
                      ->where('course_id',$courses[$i]->course_id)->get();
          $chapters[$i] = count($chapter);
        }

        //print_r($courses);

        return view('student.myCourse')->with('courses',$courses)
                                        ->with('user',$user[0])
                                        ->with('chapters',$chapters);
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
        // return "string";
        return view('student.profile');
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
