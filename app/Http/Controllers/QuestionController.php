<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Question;
use App\Answer;
use App\Biology;
use Illuminate\Support\Facades\Storage;
use DB;

class QuestionController extends Controller
{
    //          nk

    public function index() {

      $exists = Storage::disk('s3')->exists('buisness-element-4.jpg');

      return view("admin.teacher.createQuestion");
    }

    public function post_mathjs(Request $request) { 
      $an = new Answer();
      $an->answer=$request->val;

      if($an->save()) {
        return array(
          'status' => 200,
          'id' => $an->id
        );
      }
      return array('status' => 500);
    }

    public function get_mathjs($aid) {

      $id = (int)$aid;

      $db = DB::select("SELECT * FROM tbl_answer WHERE Id = {$id};");

      $array = array(
        "id" => $id,
        "answer" => $db[0]->answer
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
      }
      return redirect('/v1/teacher/create-answer');
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

    public function add_answer($qid, $option, $answer, $r_answer) {
      $q = new Answer();
      $q->question_id = $qid;
      $q->choices = $option;
      $q->answer = $answer;
      $q->right_answer = $r_answer;
      return  $q->save() ? 200 : 500;
    }

}
