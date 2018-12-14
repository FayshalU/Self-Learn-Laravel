<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $courses=DB::table('courses')->get();

      //print_r($user[0]);

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

      return view('index')->with('courses',$courses)
                          ->with('chapters',$chapters)
                          ->with('instructors',$instructors);
    }

    public function course(Request $request,$id)
    {
        $course=DB::table('courses')
                    ->where('course_id',$id)->get();


        return view('seeCourse')->with('course',$course[0]);

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

    public function coursePost(Request $request)
    {
        $id = $request->src;

        $course=DB::table('courses')
                    ->where('name',$id)->get();

        return view('seeCourse')->with('course',$course[0]);

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
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
