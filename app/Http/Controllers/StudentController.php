<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Criteria;
use App\Result;
use app\StudentInfo;
use DB;
use Carbon\Carbon;

class StudentController extends Controller
{

    public static $pre_que_l1 = 800;
    public static $pre_que_l2 = 700;
    public static $pre_que_l3 = 600;
    public static $pre_que_l4 = 550;


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

public function student_result(Request $request) {

      $rl1 = DB::select("SELECT sum(l1_result) as T1 FROM ambeyo_neet.tbl_results where student_id = 1");
      $rl2 = DB::select("SELECT sum(l2_result) as T2 FROM ambeyo_neet.tbl_results where student_id = 1");
      $rl3 = DB::select("SELECT sum(l3_result) as T3 FROM ambeyo_neet.tbl_results where student_id = 1");
      $rl4 = DB::select("SELECT sum(l4_result) as T4 FROM ambeyo_neet.tbl_results where student_id = 1");
      $tl1 = $rl1[0]->T1;
      $tl2 = $rl2[0]->T2;
      $tl3 = $rl3[0]->T3;
      $tl4 = $rl4[0]->T4;

      $sum = $tl2 + $tl4;
      return view(['student_result' => $sum]);
}

public function show_student_info(request $request) {

      $test_call = DB::select("call test_proc"); //sample stored procedure
      $info = DB::select("select * from tbl_student_total_result");
      $crit = DB::select("select * from tbl_criteria");
      $tar = DB::select("select target_percentage from tbl_students where Id = 1");

      $t = $tar[0]->target_percentage; //student target percentage

      $l1q = $this::$pre_que_l1*($t/100); //questions per target percentage
      $l2q = $this::$pre_que_l2*($t/100); //questions per target percentage
      $l3q = $this::$pre_que_l3*($t/100); //questions per target percentage
      $l4q = $this::$pre_que_l4*($t/100); //questions per target percentage

      $l1t = ($info[0]->L1_Total_Results/$l1q)*100; //exam result percentage
      $l2t = ($info[0]->L2_Total_Results/$l2q)*100; //exam result percentage
      $l3t = ($info[0]->L3_Total_Results/$l3q)*100; //exam result percentage
      $l4t = ($info[0]->L4_Total_Results/$l4q)*100; //exam result percentage

      $tot1 = $l1t*$crit[0]->percentage; //exam points per 100%
      $tot2 = $l2t*$crit[1]->percentage; //exam points per 100%
      $tot3 = $l3t*$crit[2]->percentage; //exam points per 100%
      $tot4 = $l4t*$crit[3]->percentage; //exam points per 100%
      $total_all = $tot1+$tot2+$tot3+$tot4;

      return ([
              array(
                "Target Percentage" => $t, //student target percentage
                "Level 1 Result" => $info[0]->L1_Total_Results, //student L1 exam result
                "Level 2 Result" => $info[0]->L2_Total_Results, //student L2 exam result
                "Level 3 Result" => $info[0]->L3_Total_Results, //student L3 exam result
                "Level 4 Result" => $info[0]->L4_Total_Results, //student L4 exam result
                "Level 1 Questions" => $l1q, //total questions per target percentage
                "Level 2 Questions" => $l2q, //total questions per target percentage
                "Level 3 Questions" => $l3q, //total questions per target percentage
                "Level 4 Questions" => $l4q, //total questions per target percentage
                "Level 1 result" => round($l1t)."%", //exam result percentage
                "Level 2 result" =>round($l2t)."%", //exam result percentage
                "Level 3 result" =>round($l3t)."%", //exam result percentage
                "Level 4 result" =>round($l4t)."%", //exam result percentage
                "Total level 1 result" =>round($tot1), //exam points per 100%
                "Total level 2 result" =>round($tot2), //exam points per 100%
                "Total level 3 result" =>round($tot3), //exam points per 100%
                "Total level 4 result" =>round($tot4), //exam points per 100%
                "Total All Level test Percentage" => round($total_all),
                "Total points over target Percentage" => round(($t/100)*round($total_all))."/$t",
                //$test_call
                    )
              ]);
}






















}
