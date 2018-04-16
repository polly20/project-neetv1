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
}
