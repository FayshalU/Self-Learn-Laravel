<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login.index');
});

Route::get('/login','loginController@index')->name('login.index');
Route::post('/login','loginController@verify')->name('login.verify');

Route::get('/logout','logoutController@index')->name('logout.index');


Route::get('/admin/deleteCourses','AdminController@deleteCourses')->name('admin.deleteCourses');
Route::get('/admin/profile','AdminController@profile')->name('admin.profile');
Route::get('/admin/showCourses','AdminController@showCourses')->name('admin.showCourses');
Route::get('/admin/showInstructors','AdminController@showInstructors')->name('admin.showInstructors');
Route::get('/admin/showStudents','AdminController@showStudents')->name('admin.showStudents');
Route::resource('/admin','AdminController');




Route::get('/student/course','StudentController@allCourse')->name('student.course');
Route::get('/student/showCourse','StudentController@showCourse')->name('student.showCourse');
Route::get('/student/quiz','StudentController@quiz')->name('student.quiz');
Route::get('/student/profile','StudentController@profile')->name('student.profile');
Route::resource('/student','StudentController');



Route::get('/instructor/profile','InstructorController@profile')->name('instructor.profile');
Route::get('/instructor/myCourses','InstructorController@myCourses')->name('instructor.myCourses');
Route::get('/instructor/editCourse','InstructorController@editCourse')->name('instructor.editCourse');
Route::get('/instructor/deleteCourse','InstructorController@deleteCourse')->name('instructor.deleteCourse');
Route::get('/instructor/addQuiz','InstructorController@addQuiz')->name('instrcutor.addQuiz');
Route::resource('/instructor','InstructorController');
