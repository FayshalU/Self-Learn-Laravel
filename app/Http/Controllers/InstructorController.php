<?php

namespace App\Http\Controllers;

use App\instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

      $post=DB::table('post')
                ->orderBy('date','desc')->get();

      $data = [];
      for ($i=0; $i < count($post); $i++) {
        $temp=DB::table('students')
                ->where('id',$post[$i]->user_id)->first();
        $data[$i] = $temp;
      }

      return view('instructor.index')->with('post',$post)
                          ->with('user',$user[0])
                          ->with('data',$data);
    }

    public function myCourses(Request $request)
    {
        $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();

        $courses=DB::table('courses')
                    ->where('instructor_id',$request->session()->get('user_id'))->get();

        $chapters = [];
        $data = [];

        for ($i=0; $i < count($courses); $i++) {
          $chapter = DB::table('chapter_info')
                      ->where('course_id',$courses[$i]->course_id)->get();
          $chapters[$i] = count($chapter);

          $taken=DB::table('courses_taken')
                      ->where('course_id',$courses[$i]->course_id)->get();
          $data[$i] = count($taken);
        }

        $courseNames = [];

        for ($i=0; $i < count($courses); $i++) {
          $courseNames[$i] = $courses[$i]->name;
        }

        // print_r($courseNames);

        return view('instructor.myCourses')->with('courses',$courses)
                                        ->with('user',$user[0])
                                        ->with('chapters',$chapters)
                                        ->with('data',$data)
                                        ->with('courseNames',$courseNames);
    }

    public function seeCourse(Request $request, $id)
     {
         $user=DB::table('instructors')
               ->where('id',$request->session()->get('user_id'))->get();

         $course=DB::table('courses')
                     ->where('course_id',$id)->first();

         $taken=DB::table('courses_taken')
                     ->where('course_id',$id)->get();

        $data = (object)['count'=>count($taken)];

        //Comment
        $comments = DB::table('comment')
                    ->where('course_id',$id)->get();
        $students= [];

        for ($i=0; $i < count($comments); $i++) {
          $students[$i] =DB::table('students')
                              ->where('id',$comments[$i]->user_id)->first();

          if ($students[$i] == null) {
            $students[$i] =DB::table('instructors')
                              ->where('id',$comments[$i]->user_id)->first();
          }
        }

         return view('instructor.seeCourse')->with('course',$course)
                                            ->with('user',$user[0])
                                            ->with('data',$data)
                                            ->with('comments',$comments)
                                            ->with('students',$students);
     }

     public function seeStudent(Request $request, $id)
      {
          $user=DB::table('instructors')
                ->where('id',$request->session()->get('user_id'))->get();

          $course=DB::table('courses')
                      ->where('course_id',$id)->first();

          $taken=DB::table('courses_taken')
                      ->where('course_id',$id)->get();

         // $data = (object)['count'=>count($taken)];
         //
         // //Comment
         // $comments = DB::table('comment')
         //             ->where('course_id',$id)->get();
         $students= [];

         for ($i=0; $i < count($taken); $i++) {
           $students[$i] =DB::table('students')
                               ->where('id',$taken[$i]->student_id)->first();

         }

         $chapters=DB::table('chapter_info')
                     ->where('course_id',$id)->get();

         $chapter= [];

         for ($i=0; $i < count($taken); $i++) {
           $temp =DB::table('quiz_result')
                               ->where('student_id',$taken[$i]->student_id)
                               ->where('chapter_id',$chapters[$i]->chapter_id)->get();

            $chapter[$i] = count($temp);

         }

          return view('instructor.seeStudent')->with('course',$course)
                                             ->with('user',$user[0])
                                             ->with('taken',$taken)
                                             ->with('students',$students)
                                             ->with('chapter',$chapter);
      }

     public function chapter(Request $request, $id, $id2=null)
      {
        $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();

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

        return view('instructor.seeChapter')->with('course',$course[0])
                                        ->with('chapters',$chapters)
                                        ->with('selectedChapter',(object)$selectedChapter[0])
                                        ->with('user',$user[0]);

      }

      public function quiz(Request $request, $id)
      {

          $chapter=DB::table('chapter_info')
                      ->where('chapter_id',$id)->get();
          $course=DB::table('courses')
                      ->where('course_id',$chapter[0]->course_id)->get();
          $quiz=DB::table('quiz')
                      ->where('chapter_id',$id)->get();
          $user=DB::table('instructors')
                  ->where('id',$request->session()->get('user_id'))->get();



          return view('instructor.seeQuiz')->with('course',$course[0])
                                      ->with('chapter',$chapter[0])
                                      ->with('quiz',$quiz)
                                      ->with('user',$user[0]);
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

    public function addImage(Request $request)
    {

      // echo $request->imageico;

      if ($request->hasFile('image'))
      {
        // echo "string2";
        $image = $request->file('image');
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('image'), $imageName);

        DB::table('instructors')
           ->where('id', $request->session()->get('user_id'))
           ->update(['image' => $imageName]);

           $request->session()->flash('msg','Picture updated successfully');
            return redirect()->route('instructor.profile');
      }
      else {
        $request->session()->flash('msg','Please select an image');
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

        if ($request->hasFile('image'))
        {
          $image = $request->file('image');
          $imageName = time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('image/chapter'), $imageName);

          DB::table('chapter_info')
             ->where('chapter_id', $request->chapter_id)
             ->update(['name' => $request->chapterName, 'content' => $request->content, 'image' => $imageName]);

          $request->session()->flash('msg','Chapter Edited successfully');

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

        if ($request->hasFile('image'))
        {

          $image = $request->file('image');
          $imageName = time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('image/chapter'), $imageName);

          DB::table('chapter_info')->insert(['name' => $request->chapterNameNew, 'course_id' => $request->course_id, 'content' => $request->contentNew, 'image' => $imageName]);

          $request->session()->flash('msg','Chapter added successfully');

          return redirect()->route('instructor.editCourse',$request->course_id);
        }
        else {
          DB::table('chapter_info')->insert(['name' => $request->chapterNameNew, 'course_id' => $request->course_id, 'content' => $request->contentNew]);

          $request->session()->flash('msg','Chapter added successfully');

          return redirect()->route('instructor.editCourse',$request->course_id);
        }


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

    public function deleteChapter(Request $request, $id)
    {
        $user=DB::table('instructors')
              ->where('id',$request->session()->get('user_id'))->get();

        $chapter=DB::table('chapter_info')
                    ->where('chapter_id',$id)->get();

        $course=DB::table('courses')
                    ->where('course_id',$chapter[0]->course_id)->get();

        return view('instructor.deleteChapter')->with('chapter',$chapter[0])
                                                ->with('course',$course[0])
                                              ->with('user',$user[0]);
    }

    public function deleteChapterPost(Request $request)
    {
        $id = $request->id;

        echo $request->course_id;

        if (isset($_POST['yes'])) {
          DB::table('chapter_info')->where('chapter_id', $id)->delete();
          return redirect()->route('instructor.chapter',$request->course_id);
        }
        else {
          return redirect()->route('instructor.chapter',[$request->course_id,$id]);

        }

    }

    public function deleteQuiz(Request $request, $id)
    {
        $quiz=DB::table('quiz')
                  ->where('quiz_id',$id)->get();

        $chapter=DB::table('chapter_info')
                    ->where('chapter_id',$quiz[0]->chapter_id)->get();

        DB::table('quiz')->where('quiz_id', $id)->delete();

        return redirect()->route('instructor.chapter',[$chapter[0]->course_id, $chapter[0]->chapter_id]);
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

         if ($request->hasFile('image'))
         {
           // echo "string";

           $image = $request->file('image');
           $imageName = time().'.'.$request->image->getClientOriginalExtension();
           $request->image->move(public_path('image/chapter'), $imageName);

           DB::table('courses')->insert(['instructor_id' => $request->session()->get('user_id'), 'name' => $request->coursename,'info' => $request->desc]);

           $courses=DB::table('courses')->get();
           // print_r($courses[count($courses)-1]);

           DB::table('chapter_info')->insert(['name' => $request->chapterName, 'course_id' => $courses[count($courses)-1]->course_id, 'content' => $request->content, 'image' => $imageName]);

           return redirect()->route('instructor.myCourses');
         }
         else {
           DB::table('courses')->insert(['instructor_id' => $request->session()->get('user_id'), 'name' => $request->coursename,'info' => $request->desc]);

           $courses=DB::table('courses')->get();
           // print_r($courses[count($courses)-1]);

           DB::table('chapter_info')->insert(['name' => $request->chapterName, 'course_id' => $courses[count($courses)-1]->course_id, 'content' => $request->content]);

           return redirect()->route('instructor.myCourses');
         }

       }

      // return view('instructor.addCourses')->with('user',$user[0]);
    }

    public function addComment(Request $request)
    {
      $date = Carbon::now();

      if($request->message=="")
       {
         //EMPTY:::::::::::::::;
         $request->session()->flash('msg','Comment can not be empty');
         return redirect()->route('instructor.seeCourse',$request->course_id);
       }
       else {
         DB::table('comment')->insert(['course_id' => $request->course_id, 'user_id' => $request->session()->get('user_id'), 'date' => $date,'text' => $request->message]);

         // $request->session()->flash('msg','Comment added successfully');
         return redirect()->route('instructor.seeCourse',$request->course_id);
       }
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
