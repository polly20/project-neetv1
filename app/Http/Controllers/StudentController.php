<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Criteria;
use Carbon\Carbon;
use DB;

class StudentController extends Controller
{
    //

    public static $total_percent = 100;

    public static $total_subjects = 3;

    public static $total_questions = 14000;

    public function add_student(Request $request) {
        // return $request;

        $dt = Carbon::parse($request->birthday);

        $s = new Student();
        $s->facebook_id = "N/A";
        $s->firstname = $request->firstname;
        $s->lastname = $request->lastname;
        $s->birthday = $dt;
        $s->email = $request->email;
        $s->mobile = $request->mobile;
        $s->password = "123456";
        $s->type = (int)$request->type;
        $s->status = (int)$request->status;

        if($s->save()) {
            return array(
                "Status" => 200,
                "Message" => "Success"
            );
        }

        return array(
            "Status" => 500,
            "Message" => "Error"
        );
    }

    public function set_student_target(Request $request) {

      $target_days = 30;
      $target_percentage = 90;

      //Variables below are admin pre-set
      $question_per_day = 100;
      $total_set_questions = 3000;
      $l1_question_per_100percent = 850;
      $l2_question_per_100percent = 750;
      $l3_question_per_100percent = 800;
      $l4_question_per_100percent = 600;


      //$target_percentage = (int)$request->$target_percentage;

      if($target_percentage < 50 || $target_percentage > 100) {
        return array(
          'status' => 404,
          'message' => "The total percent is invalid!"
        );
      }

      //$t = $this::$total_percent / $this::$total_subjects; //round( $target / 3 ); // divide by 3 subjects

      $s1 = $l1_question_per_100percent * ($target_percentage / 100);
      $s2 = $l2_question_per_100percent * ($target_percentage / 100);
      $s3 = $l3_question_per_100percent * ($target_percentage / 100);
      $s4 = $l4_question_per_100percent * ($target_percentage / 100);

      $tt = $total_set_questions * ($target_percentage / 100);
      // 33.33% round of into 34% percent divived by 3 levels

      //$l1 = round( $s1 * 0.15 );
      //$l2 = round( $s2 * 0.22 );
      //$l3 = round( $s3 * 0.28 );
      //$l4 = round( $s4 * 0.35 );

      $per_day = ($l1_question_per_100percent + $l2_question_per_100percent + $l3_question_per_100percent + $l4_question_per_100percent) / 30;

      $set_ = array(
        "Total Allocated Questions" => $total_set_questions,
        "Total Target %" => $target_percentage . "%",
        "Total Target Question" => $tt,
        "Level_1" => array(
          //"percentage" => "15%",
          "total" => $s1
        ),
        "Level_2" => array(
          //"percentage" => "22%",
          "total" => $s2
        ),
        "Level_3" => array(
          //"percentage" => "28%",
          "total" => $s3
        ),
        "Level_4" => array(
          //"percentage" => "35%",
          "total" => $s4
        ),

        "You have" => $target_days . " days left to finish the pre-test"
        //"Minimum Questions per day" => round($per_day),
        //"Total_Questions_for_30days" => $l1 + $l2 + $l3 + $l4
      );
      return $set_;
    }

    public function student_result($id=1) {
      $b = Criteria::where("ID", (int)$id)->get(['category', 'description']);
      return ["data" => $b];
    }

    public function charles_sample()
    {
      // $data = array(
      //   "name" => "Sample",
      //   "work_days" => "27",
      //   "work_days_a_week" => "5"
      // );

      $db = DB::select("SELECT * FROM tbl_total_questions;");
      return $db;

      // return view('charles', compact('data'));
    }
}
