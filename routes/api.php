<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/v1/add-student", "StudentController@add_student");

Route::get("/v1/teacher/create-question", "QuestionController@index");

Route::post("/v1/teacher/question/execute", "QuestionController@question_exec");

Route::get("/v1/teacher/create-answer", "QuestionController@answer");

Route::get("/v1/teacher/answer/execute", "QuestionController@answer_exec");

Route::get("/v1/teacher/get-biology/{id}", "QuestionController@get_biology");
