<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Question;
use App\Answer;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function Dashboard() {
      return view('admin.dashboard');
    }

    public function Question_Subject() {
      return view('admin.question.subject');
    }

    public function Question_List($subject) {
      $subject = array('name' => $subject);
      return view('admin.question.list', compact('subject'));
    }

    public function Question_List_Data($subject_id) {

      $data = DB::select("SELECT * FROM tbl_question WHERE subject_id = {$subject_id};");

      $count = COUNT($data);

      return array(
        "status" => $count > 0 ? 200 : 404,
        "message" => $count > 0 ? "{$count} Total Records Found." : "No Records Found.",
        "data" => $count > 0 ? $data : null
      );
    }

    public function Question_Add($subject) {
      $subject = array('name' => $subject);
      return view('admin.question.add_question', compact('subject'));
    }
}
