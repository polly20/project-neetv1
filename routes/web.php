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

Route::get('/student/target', 'StudentController@set_student_target');
