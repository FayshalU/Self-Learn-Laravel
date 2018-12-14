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

Route::get('/','HomeController@index')->name('home.index');
Route::get('/{id}/courses','HomeController@course')->name('home.courses');
Route::get('/searchCourse/{id}','HomeController@searchCourse')->name('home.searchCourse');
Route::post('/coursesPost','HomeController@coursePost')->name('home.coursePost');

Route::get('/login','loginController@index')->name('login.index');
Route::post('/login','loginController@verify')->name('login.verify');

Route::get('/register','RegistrationController@index')->name('register.index');
Route::post('/register','RegistrationController@verify')->name('register.verify');

Route::get('/logout','logoutController@index')->name('logout.index');


Route::get('/admin/deleteCourses','AdminController@deleteCourses')->name('admin.deleteCourses');
Route::get('/admin/profile','AdminController@profile')->name('admin.profile');
Route::get('/admin/showCourses','AdminController@showCourses')->name('admin.showCourses');
Route::get('/admin/showInstructors','AdminController@showInstructors')->name('admin.showInstructors');
Route::get('/admin/showStudents','AdminController@showStudents')->name('admin.showStudents');
Route::resource('/admin','AdminController');




Route::get('/student/course','StudentController@allCourse')->name('student.course');
Route::get('/student/searchCourse/{id}','StudentController@searchCourse')->name('student.searchCourse');
Route::get('/student/{id}/showCourse','StudentController@showCourse')->name('student.showCourse');
Route::post('/student/showCoursePost','StudentController@showCoursePost')->name('student.showCoursePost');
Route::get('/student/myCourse','StudentController@myCourse')->name('student.myCourse');
Route::get('/student/chapter/{id}/{id2?}','StudentController@chapter')->name('student.chapter');
Route::get('/student/{id}/enroll','StudentController@enroll')->name('student.enroll');
Route::get('/student/{id}/quiz','StudentController@quiz')->name('student.quiz');
Route::get('/student/quizResult/{id}','StudentController@storeResult')->name('student.storeResult');
Route::get('/student/share/{id}','StudentController@share')->name('student.share');
Route::get('/student/profile','StudentController@profile')->name('student.profile');
Route::resource('/student','StudentController');



Route::get('/instructor/profile','InstructorController@profile')->name('instructor.profile');
Route::get('/instructor/myCourses','InstructorController@myCourses')->name('instructor.myCourses');
Route::get('/instructor/editCourse','InstructorController@editCourse')->name('instructor.editCourse');
Route::get('/instructor/deleteCourse','InstructorController@deleteCourse')->name('instructor.deleteCourse');
Route::get('/instructor/addQuiz','InstructorController@addQuiz')->name('instrcutor.addQuiz');
Route::resource('/instructor','InstructorController');
