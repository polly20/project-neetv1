<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjects;
use DB;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
    }

    public function index() {
        $subjects = $this->get_subjects();
        return view('admin.subject.subject', compact('subjects'));
    }

    public function store(Request $request) {
        $aa = new Subjects();
        $aa->subject_code = $request->get('subject_code');
        $aa->subject_name = $request->get('subject_name');
        $aa->status = 1; // 0 = Not Active | 1 = Active
        if($aa->save()) {
            return response()->json(['status' => 200, 'result' => 'Subject Successfully Added.']);
        }
        return response()->json(['status' => 404, 'result' => 'Failed to add subject.']);
    }

    public function edit($subject_id) {
        $data = DB::SELECT("SELECT Id, subject_code, subject_name FROM tbl_subjects WHERE Id = {$subject_id}");
        if(COUNT($data) > 0) {
            return array("status" => 200, "result" => $data);
        }
        return array("status" => 404, "result" => "No Result Found");
    }

    public function update(Request $request) {
        Subjects::where('Id', '=', $request->get('subject_id'))
            ->update([
                'subject_code' => $request->get('subject_code'),
                'subject_name' => $request->get('subject_name')
            ]);

        return response()->json(['status' => 200, 'result' => 'Update Successful']);
    }

    public function delete($subject_id) {
        $chk_syllabus = DB::SELECT("SELECT Id FROM tbl_topics WHERE subject_uid = {$subject_id} LIMIT 1");
        if(COUNT($chk_syllabus) > 0) {
            return response()->json(['status' => 404, 'result' => 'Failed to delete this subject because this is related to other records.']);
        }else{
            DB::SELECT("DELETE FROM tbl_subjects WHERE Id = {$subject_id}");
            return response()->json(['status' => 200, 'result' => 'Subject successfully deleted']);
        }
    }

//--------------------------------------------------------
// GET DATA
//--------------------------------------------------------

    public function get_subjects()
    {
        $topic_count = new TopicsController();

        $data = DB::SELECT("SELECT * FROM tbl_subjects");
        if(COUNT($data) > 0) {
            for($i = 0; $i < COUNT($data); $i++) {
                $tc = $topic_count->total_topics_per_subject($data[$i]->Id);
                $results[] = array(
                    "topic_count" => $tc,
                    "Id" => $data[$i]->Id,
                    "subject_code" => $data[$i]->subject_code,
                    "subject_name" => $data[$i]->subject_name,
                    "status" => $data[$i]->status
                );
            }

            return array("status" => 200, "result" => $results);
        }
        return array("status" => 404, "result" => "No Result Found");
    }
}
