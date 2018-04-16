<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
<<<<<<< HEAD
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
=======
        // $this->middleware('auth');
>>>>>>> 5faf0e70be25e7523faa7abd3bde6db628cdfdac
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Storage::disk('s3')->files();

        $domain = "https://s3-ap-southeast-1.amazonaws.com/ambeyo-s3-bucket-v2/";

        for($i = 0; $i < COUNT($files); $i++) {
          echo "<a href='" . $domain . $files[$i] . "' target='_blank'>" . $domain . $files[$i] . "</a> <br />";
        }

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
