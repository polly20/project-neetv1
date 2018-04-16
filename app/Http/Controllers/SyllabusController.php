<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Syllabus;
use DB;

class SyllabusController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
    }

    public function index() {
        //return view('');
    }


//--------------------------------------------------------
// GET DATA
//--------------------------------------------------------

    public function get_syllabus()
    {
        $data = DB::SELECT("SELECT Id, class_number, status FROM tbl_syllabus");
        if(COUNT($data) > 0) {
            return array("status" => 200, "result" => $data);
        }
        return array("status" => 404, "result" => "No Result Found");
    }
}
