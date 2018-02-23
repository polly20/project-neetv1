<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Question;
use App\Answer;
use App\Biology;

class QuestionController extends Controller
{
    //


    public function index() {

      $h =  new HelperController("pogi");

      // dd($h->get_sample_a("charles nga ay"));

      return view("admin.teacher.createQuestion");
    }


    public function get_mathjs(Request $request) {

      $array = array(
        "val" => $request->val
      );

      return view("sample", compact('array'));
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
        return redirect('/v1/teacher/create-answer');
        // return view("admin.teacher.createAnswer", compact('question'));
      }
      return redirect('/v1/teacher/create-answer');
      // return view("admin.teacher.createQuestion");
    }

    public function answer() {
        return view("admin.teacher.createAnswer");
    }

    public function answer_exec(Request $request) {

      $qid = $request->question;
      $answers = $request->answers;
      $r_answer = $request->answer;

      for($i = 0; $i < COUNT($answers); $i++) {
        $q = new Answer();
        $q->question_id = $qid;
        $q->choices = $i;
        $q->answer = $answers[$i];
        $q->right_answer = $r_answer;
        $q->save();
      }

      return view("admin.teacher.createQuestion");
    }

    public function get_biology($id) {
      $b = Question::where("Id", (int)$id)->get(['subject_id', 'question']);
      return ["data" => $b];
    }

}
