<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topics;
use DB;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
    }

    public function index($subject_name = null) {

        $get_subjects = new SubjectController();
        $subjects = $get_subjects->get_subjects();

        $get_syllabus = new SyllabusController();
        $syllabus = $get_syllabus->get_syllabus();

        $topics = $this->get_topics($subject_name);

        return view('admin.topic.topic', compact('topics', 'subjects', 'syllabus'));
    }

    public function store(Request $request) {
        $aa = new Topics();
        $aa->subject_uid = $request->get('subject_uid');
        $aa->syllabus_uid = $request->get('syllabus_uid');
        $aa->unit_number = $request->get('unit_number');
        $aa->topic_name = $request->get('topic_name');
        $aa->status = 1; // 0 = Not Active | 1 = Active
        if($aa->save()) {
            return response()->json(['status' => 200, 'result' => 'Topic Successfully Added.']);
        }
        return response()->json(['status' => 404, 'result' => 'Failed to add topic.']);
    }

    public function edit($topic_id) {
        $data = DB::SELECT("SELECT Id, subject_uid, syllabus_uid, unit_number, topic_name FROM tbl_topics WHERE Id = {$topic_id}");
        if(COUNT($data) > 0) {
            return array("status" => 200, "result" => $data);
        }
        return array("status" => 404, "result" => "No Result Found");
    }

    public function update(Request $request) {
        Topics::where('Id', '=', $request->get('topic_id'))
            ->update([
                'subject_uid' => $request->get('subject_uid'),
                'syllabus_uid' => $request->get('syllabus_uid'),
                'unit_number' => $request->get('unit_number'),
                'topic_name' => $request->get('topic_name')
            ]);

        return response()->json(['status' => 200, 'result' => 'Update Successful']);
    }

    public function delete($topic_id) {
        $chk_topic_uid = DB::SELECT("SELECT Id FROM tbl_sub_topics WHERE topic_uid = {$topic_id} LIMIT 1");
        if(COUNT($chk_topic_uid) > 0) {
            return response()->json(['status' => 404, 'result' => 'Failed to delete this topic because this is related to other records.']);
        }else{
            DB::SELECT("DELETE FROM tbl_topics WHERE Id = {$topic_id}");
            return response()->json(['status' => 200, 'result' => 'Topic successfully deleted']);
        }
    }

//--------------------------------------------------------
// GET DATA
//--------------------------------------------------------

    public function get_topics($subject_name)
    {
        $sub_topic_count = new SubTopicsController();

        $where = $subject_name == null ? "" : " WHERE subj.subject_name = '{$subject_name}'";

        $data = DB::SELECT("
            SELECT topic.Id as Id, sy.Id as syllabus_uid, sy.class_number, subj.subject_name, topic.unit_number, topic.topic_name 
            FROM tbl_topics as topic
            INNER JOIN tbl_syllabus as sy ON sy.Id = topic.syllabus_uid
            INNER JOIN tbl_subjects as subj ON subj.Id = topic.subject_uid $where
        ");

        if(COUNT($data) > 0) {
            for($i = 0; $i < COUNT($data); $i++) {
                $stc = $sub_topic_count->total_sub_topics_per_topic($data[$i]->Id);
                $return[] = array(
                    "Id" => $data[$i]->Id,
                    "syllabus_uid" => $data[$i]->syllabus_uid,
                    "class_number" => $data[$i]->class_number,
                    "subject_name" => $data[$i]->subject_name,
                    "unit_number" => $data[$i]->unit_number,
                    "topic_name" => $data[$i]->topic_name,
                    "sub_topic_count" => $stc
                );
            }

            return array("status" => 200, "result" => $return);
        }

        return array("status" => 404, "result" => "No Result Found");
    }

    public function total_topics_per_subject($subject_uid) {
        $data = Topics::where('subject_uid', '=', $subject_uid)->count();
        return $data;
    }
}
