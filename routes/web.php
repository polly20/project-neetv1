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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/{name?}", function($name = null) {
    if($name == null) {
        return view('welcome');
    }
    return ["Name" => $name];
});

Route::get("/v1/add-student", "StudentController@add_student");

Route::get("/v1/teacher/create-question", "QuestionController@index");

Route::post("/v1/teacher/question/execute", "QuestionController@question_exec");

Route::get("/v1/teacher/create-answer", "QuestionController@answer");

Route::get("/v1/teacher/answer/execute", "QuestionController@answer_exec");

Route::get("/v1/teacher/get-biology/{id}", "QuestionController@get_biology");

Route::get('/v1/user/{id}', 'Hellocontroller@show');
