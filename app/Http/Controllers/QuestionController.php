<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;
use App\Question;
use App\Answer;

class QuestionController extends Controller
{
    //

    public function index() {

      return view("admin.teacher.createquestion");

    }

    public function question_exec(Request $request) {

      $q = new Question();
      $q->subject_id = $request->subject;
      $q->question = $request->question;

      if($q->save()) {
        $question = array(
          'Id' => $q->id,
          'Question' => $request->question
        );
        return view("admin.teacher.createanswer", compact('question'));
      }

      return view("admin.teacher.createquestion");

    }


    public function answer() {

        return view("admin.teacher.createanswer");

    }

}
