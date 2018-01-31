<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use Carbon\Carbon;

class StudentController extends Controller
{
    //

    public static $total_percent = 100;

    public static $total_subjects = 3;

    public static $total_questions = 10000;

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

      $target = (int)$request->target;

      if($target < 50 || $target > 100) {
        return array(
          'status' => 404,
          'message' => "The total percent is valid"
        );
      }

      $t = $this::$total_percent / $this::$total_subjects; //round( $target / 3 ); // divide by 3 subjects

      $s = $this::$total_questions * ($target / 100);

      // 33.33% round of into 34% percent divived by 3 levels

      $l1 = round( $s * 0.12 );
      $l2 = round( $s * 0.12 );
      $l3 = round( $s * 0.10 );
      $per_day = ($l1 + $l2 + $l3) / 30;

      $set_ = array(
        "Total_Question_Allocated" => $this::$total_questions,
        "Total_Target" => $target . "%",
        "Total_Target_Question" => $s,
        "Level_1" => array(
          "percentage" => "12%",
          "total" => $l1
        ),
        "Level_2" => array(
          "percentage" => "12%",
          "total" => $l2
        ),
        "Level_3" => array(
          "percentage" => "10%",
          "total" => $l3
        ),
        "Total_Questions_per_day" => round($per_day),
        "Total_Questions_for_30days" => $l1 + $l2 + $l3
      );

      return $set_;

    }
}
