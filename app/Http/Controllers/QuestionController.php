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
    //

    public function index() {

      // $h =  new HelperController("pogi");

      // dd($h->get_sample_a("charles nga ay"));

      $exists = Storage::disk('s3')->exists('buisness-element-4.jpg');

      dd($exists);

      return view("admin.teacher.createQuestion");
    }

    public function post_mathjs(Request $request) {
      $an = Answer::where("Id", 65)
      ->update(
        array(
          "answer" => $request->val
        )
      );

      if($an) {
        return array('status' => 200);
      }
      return array('status' => 500);
    }

    public function get_mathjs(Request $request) {
      $db = DB::select("SELECT * FROM tbl_answer WHERE Id = 65;");

      $array = array(
        "val" => $request->val,
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


    //



    public function question_api(Request $request) {
      $q = new Question();
      $q->subject_id = $request->subject;
      $q->question = $request->question;

      if($q->save()) {
        $question = array(
          "status" => 200,
          'id' => $q->id
        );

        $this->add_answer($q->id, "A", $request->A, "NA");
        $this->add_answer($q->id, "B", $request->B, "NA");
        $this->add_answer($q->id, "C", $request->C, "NA");
        $this->add_answer($q->id, "D", $request->D, "NA");
      }
      else {
        $question = array(
          "status" => 500,
          'id' => 0
        );
      }
      return $question;
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
