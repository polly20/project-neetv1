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
    return view('admin.login');
});

//-----------------------
// MJT ROUTES
//-----------------------

Route::get('/marchjax', function(){
    return view('marchjax');
});

Route::get('/marchjax_preview/{preview_name}', function($preview_name){
    return view('marchjax_preview', ['preview_name' => $preview_name]);
});

Route::get('/questions_preview/{preview_name}', function($preview_name){
    return view('admin.question.questions_preview', ['preview_name' => $preview_name]);
});

Route::get('/test/{topic_id}', 'SubTopicsController@get_sub_topics');

Route::get('/dashboard', 'HomeController@Dashboard')->name('dashboard');

Route::get('/subjects', 'SubjectController@index')->name('subjects');
Route::get('/subjects/edit/{subject_id}', 'SubjectController@edit')->name('subjects.edit');
Route::get('/subjects/delete/{subject_id}', 'SubjectController@delete')->name('subjects.delete');
Route::post('/subjects/store', 'SubjectController@store')->name('subjects.store');
Route::post('/subjects/update', 'SubjectController@update')->name('subjects.update');

Route::get('/topics/{subject_name?}', 'TopicsController@index')->name('topics');
Route::get('/topics/edit/{topic_id}', 'TopicsController@edit')->name('topics.edit');
Route::get('/topics/delete/{topic_id}', 'TopicsController@delete')->name('topics.delete');
Route::post('/topics/update', 'TopicsController@update')->name('topics.update');
Route::post('/topics/store', 'TopicsController@store')->name('topics.store');

Route::get('/topics/{topic_id}/sub', 'SubTopicsController@index')->name('subtopics');
Route::post('/topics/store/sub', 'SubTopicsController@store')->name('subtopics.store');
Route::get('/topics/edit/{sub_topic_id}/sub', 'SubTopicsController@edit')->name('subtopics.edit');
Route::post('/topics/update/sub', 'SubTopicsController@update')->name('subtopics.update');
Route::get('/topics/delete/{sub_topic_id}/sub', 'SubTopicsController@delete')->name('subtopics.delete');

Route::get('/syllabus', 'SyllabusController@get_syllabus');

Route::get('/questions', 'QuestionsController@index')->name('questions');





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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
