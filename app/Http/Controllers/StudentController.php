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

      // $rl1 = DB::select("SELECT sum(l1_result) as T1 FROM ambeyo_neet.tbl_results where student_id = 1");
      // $rl2 = DB::select("SELECT sum(l2_result) as T2 FROM ambeyo_neet.tbl_results where student_id = 1");
      // $rl3 = DB::select("SELECT sum(l3_result) as T3 FROM ambeyo_neet.tbl_results where student_id = 1");
      // $rl4 = DB::select("SELECT sum(l4_result) as T4 FROM ambeyo_neet.tbl_results where student_id = 1");
      // $tl1 = $rl1[0]->T1;
      // $tl2 = $rl2[0]->T2;
      // $tl3 = $rl3[0]->T3;
      // $tl4 = $rl4[0]->T4;
      //
      // $sum = $tl2 + $tl4;
      // return view(['student_result' => $sum]);
}
    public function show_student_info(request $request) {

      $exam_questions = array();
      $level_results = array();
      $total_level_points = array();
      $results_per_level = array();
      $total_all_points = 0;
      $criteria = DB::select("select * from tbl_criteria");
      $target = DB::select("select target_percentage from tbl_students where Id = 1");
      $preset = DB::select("select totalq as val from tbl_preset_question");


        $t = $target[0]->target_percentage / 100; //student target percentage

          for($i = 0; $i < COUNT($preset); $i++) {

            $s = $preset[$i]->val * $t;   //Total_Exam_Questions

            $exam_questions += array( "level".($i+1) => $s );

            $n = $i + 1;
            $r = DB::select("select SUM(result) AS r from tbl_results where student_id = 1 and level = {$n}");  //Exam_Results_Percentage
            $l_results = (float)number_format(($r[0]->r / $s) * 100, 2);
            $level_results += array( "level".($i+1) => $l_results . "%");

            $results_per_level += array("level" . ($i+1) => $r[0]->r);    //Exam_Results

            $p_results = (float)number_format($l_results * $criteria[$i]->percentage , 2); //Exam_Points_per_Criteria
            $total_level_points += array( "level".($i+1) => $p_results );

            $total_all_points += $p_results;  //Total_points
                                                          }
        $total_result = (($t/100) * $total_all_points) * 100; //Total_Exam_Result

      return array(
        "Target_Percentage" => $target[0]->target_percentage, //student target percentage
        "Target_Exam_Questions" => $exam_questions, //total exam questions
        "Exam_Results" => $results_per_level,
        "Exam_Results_per_Level" => $level_results,
        "Exam_Points_per_Criteria" => $total_level_points,
        "Total_Exam_Points" => number_format($total_all_points , 2),
        "Actual_Exam_Result" => round($total_result) . "/" . $target[0]->target_percentage
      );
}






















}
