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
    return view('welcome');
});


Route::get('/dashboard', 'HomeController@Dashboard');

// Route::get('/product', 'HomeController@product');
//
// Route::get('/mail', 'Controller@test_email');

Route::get('/question/subject', 'HomeController@Question_Subject');

Route::get('/question/subject/{subject}', 'HomeController@Question_List');

Route::get('/question/subject/get/{subject}', 'HomeController@Question_List_Data');

Route::get('/question/subject/add/{subject}', 'HomeController@Question_Add'); //question_api

Route::get('/question/add-with-answers-and-diagram', 'QuestionController@question_api'); //question_api

Route::get('/student/result', 'StudentController@student_result');

Route::get('/student/studentinfo', 'StudentController@show_student_info');

Route::get('/charles/sample', 'StudentController@charles_sample');

Route::get('/charles/sample/mathjs/post', 'QuestionController@post_mathjs');

Route::get('/charles/sample/mathjs/get/{aid}', 'QuestionController@get_mathjs');

//get_mathjs

Route::get('/charles/get', function() {
  return ["sample" => 200];
});

Route::post('/charles/post', function() {
  return ["sample" => 200];
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
