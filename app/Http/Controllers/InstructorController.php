<?php

namespace App\Http\Controllers;

use App\instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();

      $posts=DB::table('post')->get();

      return view('instructor.index')->with('posts',$posts)
                                    ->with('user',$user[0]);
    }

   public function myCourses(Request $request)
    {
        $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();

        $courses=DB::table('courses')
                    ->where('instructor_id',$request->session()->get('user_id'))->get();

        $chapters = [];

        for ($i=0; $i < count($courses); $i++) {
          $chapter = DB::table('chapter_info')
                      ->where('course_id',$courses[$i]->course_id)->get();
          $chapters[$i] = count($chapter);
        }

        return view('instructor.myCourses')->with('courses',$courses)
                                        ->with('user',$user[0])
                                        ->with('chapters',$chapters);
    }


    public function addQuiz(Request $request, $id)
    {
      $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();

      $course=DB::table('courses')
              ->where('course_id',$id)->get();

      $chapters=DB::table('chapter_info')
              ->where('course_id',$id)->get();

      return view('instructor.addQuiz')->with('user',$user[0])
                                          ->with('course',$course[0])
                                          ->with('chapters',$chapters);
    }

    public function addQuizPost(Request $request)
    {
      if($request->question=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Question can not be empty');
         return redirect()->route('instructor.addQuiz',$request->course_id);
       }
       else if($request->op1=="")
        {
          //EMPTY:::::::::::::::;
          $request->session()->flash('msg','Option-1 can not be empty');
          return redirect()->route('instructor.addQuiz',$request->course_id);
        }
      else if($request->op2=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Option-2 can not be empty');
         return redirect()->route('instructor.addQuiz',$request->course_id);
       }
       else if($request->op3=="")
        {
          //EMPTY:::::::::::::::;
          $request->session()->flash('msg','Option-3 can not be empty');
          return redirect()->route('instructor.addQuiz',$request->course_id);
        }
        else if($request->op4=="")
         {
           //EMPTY:::::::::::::::;
           $request->session()->flash('msg','Option-4 can not be empty');
           return redirect()->route('instructor.addQuiz',$request->course_id);
         }
         else if($request->answer=="")
          {
            //EMPTY:::::::::::::::;
            $request->session()->flash('msg','Answer can not be empty');
            return redirect()->route('instructor.addQuiz',$request->course_id);
          }
         else {
           DB::table('quiz')->insert(['chapter_id' => $request->chapter_id, 'question' => $request->question, 'op1' => $request->op1, 'op2' => $request->op2, 'op3' => $request->op3, 'op4' => $request->op4, 'answer' => $request->answer]);

           $request->session()->flash('msg','Quiz added successfully');

           return redirect()->route('instructor.addQuiz',$request->course_id);
         }
    }

    public function profile(Request $request)
    {
      $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();


      $temp=DB::table('courses')
              ->where('instructor_id',$request->session()->get('user_id'))->get();

      $data = (object)['course'=>count($temp)];

        return view('instructor.profile')->with('user',$user[0])
                                          ->with('data',$data);
    }

    public function editInfo(Request $request)
    {
      if($request->name=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Name can not be empty');
         return redirect()->route('instructor.profile');
       }
       else if(strpbrk($request->name , '1234567890') !== false)
       {
        $request->session()->flash('msg','Name can not contain numbers');
         return redirect()->route('instructor.profile');
       }
       else if($request->email=="")
       {
         //EMPTY:::::::::::::::;
        $request->session()->flash('msg','Email can not be empty');
         return redirect()->route('instructor.profile');
       }
       else if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
       {
        $request->session()->flash('msg','Invalid Email');
         return redirect()->route('instructor.profile');
       }
       else {
         DB::table('instructors')
            ->where('id', $request->session()->get('user_id'))
            ->update(['name' => $request->name, 'email' => $request->email]);

        $request->session()->flash('msg','Information updated successfully');
         return redirect()->route('instructor.profile');
       }
    }

    public function editPass(Request $request)
    {
      $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();


      if($request->current=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Current password can not be empty');
         return redirect()->route('instructor.profile');
       }
       else if($request->current!=$user[0]->password)
        {
          $request->session()->flash('msg','Current password does not match');
          return redirect()->route('instructor.profile');
        }
        else if($request->new=="")
         {
           //EMPTY:::::::::::::::;
           $request->session()->flash('msg','New password can not be empty');
           return redirect()->route('instructor.profile');
         }
        else if(strlen($request->new) <4)
       	{
          $request->session()->flash('msg','New Password length must be at least 4');
       		return redirect()->route('instructor.profile');
       	}
        else {
          DB::table('instructors')
             ->where('id', $request->session()->get('user_id'))
             ->update(['password' => $request->new]);

         DB::table('login')
            ->where('id', $request->session()->get('user_id'))
            ->update(['password' => $request->new]);

         $request->session()->flash('msg','Password updated successfully');
          return redirect()->route('instructor.profile');
        }

    }

    public function editCourse(Request $request, $id)
    {

      $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();

      $course=DB::table('courses')
              ->where('course_id',$id)->get();

      $chapters=DB::table('chapter_info')
              ->where('course_id',$id)->get();

      return view('instructor.editCourse')->with('user',$user[0])
                                          ->with('course',$course[0])
                                          ->with('chapters',$chapters);
    }

    public function editCourseInfo(Request $request)
    {

      if($request->coursename=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Course name can not be empty');
         return redirect()->route('instructor.editCourse',$request->course_id);
       }
       else if($request->desc=="")
       {
         //EMPTY:::::::::::::::;
        $request->session()->flash('msg','Description can not be empty');
         return redirect()->route('instructor.editCourse',$request->course_id);
       }
       else {
         DB::table('courses')
            ->where('course_id', $request->course_id)
            ->update(['name' => $request->coursename, 'info' => $request->desc]);

        $request->session()->flash('msg','Information updated successfully');
         return redirect()->route('instructor.editCourse',$request->course_id);
       }

    }

    public function editChapter(Request $request)
    {

      if($request->chapterName=="")
      {
        //EMPTY:::::::::::::::;
        $request->session()->flash('msg','Chapter name can not be empty');
        return redirect()->route('instructor.editCourse',$request->course_id);
      }
      else if($request->content=="")
      {
        //EMPTY:::::::::::::::;
       $request->session()->flash('msg','Chapter content can not be empty');
        return redirect()->route('instructor.editCourse',$request->course_id);
      }
      else {


        DB::table('chapter_info')
           ->where('chapter_id', $request->chapter_id)
           ->update(['name' => $request->chapterName, 'content' => $request->content]);

        $request->session()->flash('msg','Chapter Edited successfully');

        return redirect()->route('instructor.editCourse',$request->course_id);

      }

    }

    public function addChapterEdit(Request $request)
    {
      if($request->chapterNameNew=="")
      {
        //EMPTY:::::::::::::::;
        $request->session()->flash('msg','Chapter name can not be empty');
        return redirect()->route('instructor.editCourse',$request->course_id);
      }
      else if($request->contentNew=="")
      {
        //EMPTY:::::::::::::::;
       $request->session()->flash('msg','Chapter content can not be empty');
        return redirect()->route('instructor.editCourse',$request->course_id);
      }
      else {

        DB::table('chapter_info')->insert(['name' => $request->chapterNameNew, 'course_id' => $request->course_id, 'content' => $request->contentNew]);

        $request->session()->flash('msg','Chapter added successfully');

        return redirect()->route('instructor.editCourse',$request->course_id);

      }

    }


    public function deleteCourse(Request $request, $id)
    {
        $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();

        $course=DB::table('courses')
                    ->where('course_id',$id)->get();


        return view('instructor.deleteCourse')->with('course',$course[0])
                                              ->with('user',$user[0]);
    }

    public function deleteCoursePost(Request $request)
    {
        $id = $request->id;

        if (isset($_POST['yes'])) {
          DB::table('courses')->where('course_id', $id)->delete();
          return redirect()->route('instructor.myCourses');
        }
        else {
          return redirect()->route('instructor.myCourses');
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $user=DB::table('instructors')
            ->where('id',$request->session()->get('user_id'))->get();

      return view('instructor.addCourses')->with('user',$user[0]);
    }

    public function addCourse(Request $request)
    {
      if($request->coursename=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Course name can not be empty');
         return redirect()->route('instructor.create');
       }
       else if($request->desc=="")
       {
         //EMPTY:::::::::::::::;
        $request->session()->flash('msg','Description can not be empty');
         return redirect()->route('instructor.create');
       }
       else if($request->chapterName=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Chapter name can not be empty');
         return redirect()->route('instructor.create');
       }
       else if($request->content=="")
       {
         //EMPTY:::::::::::::::;
        $request->session()->flash('msg','Chapter content can not be empty');
         return redirect()->route('instructor.create');
       }
       else {
         DB::table('courses')->insert(['instructor_id' => $request->session()->get('user_id'), 'name' => $request->coursename,'info' => $request->desc]);

         $courses=DB::table('courses')->get();
         print_r($courses[count($courses)-1]);

         DB::table('chapter_info')->insert(['name' => $request->chapterName, 'course_id' => $courses[count($courses)-1]->course_id, 'content' => $request->content]);

         return redirect()->route('instructor.myCourses');

       }

      // return view('instructor.addCourses')->with('user',$user[0]);
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
     * @param  \App\instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(instructor $instructor)
    {
        // return "sdvdsfbsdfb";
        // return view('instructor.editCourse');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(instructor $instructor)
    {
        // return view('instructor.deleteCourse');
    }
}
