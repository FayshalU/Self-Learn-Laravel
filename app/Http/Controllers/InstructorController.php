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
    public function index()
    {
        return view('instructor.index');
    }

   public function myCourses(Request $request)
    {
        // return "string";
        return view('instructor.myCourses');
    }


    public function addQuiz(Request $request)
    {
        // return "string";
        return view('instructor.addQuiz');
    }

    public function profile(Request $request)
    {
        // return "string";
        return view('instructor.profile');
    }

    public function editCourse(Request $request)
    {
        // return "string";
        return view('instructor.editCourse');
    }
    public function deleteCourse(Request $request)
    {
        // return "string";
        return view('instructor.deleteCourse');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.addCourses');
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
