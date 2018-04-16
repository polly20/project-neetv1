<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubTopics;
use DB;

class SubTopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
    }

    public function index($topic_id) {

//        $get_subjects = new SubjectController();
//        $subjects = $get_subjects->get_subjects();
//
//        $get_syllabus = new SyllabusController();
//        $syllabus = $get_syllabus->get_syllabus();
//
        $sub_topics = $this->get_sub_topics($topic_id);
//
//        return view('admin.topic.sub-topic', compact('topics', 'subjects', 'syllabus'));
        return view('admin.topic.sub-topic', compact('sub_topics'));
    }

    public function store(Request $request) {
        $aa = new SubTopics();
        $aa->topic_uid = $request->get('topic_id');
        $aa->sub_topic_name = $request->get('sub_topic_name');
        $aa->status = 1; // 0 = Not Active | 1 = Active
        if($aa->save()) {
            return response()->json(['status' => 200, 'result' => 'Sub Topic Successfully Added.']);
        }
        return response()->json(['status' => 404, 'result' => 'Failed to add sub topic.']);
    }

    public function edit($sub_topic_id) {
        $data = DB::SELECT("SELECT Id, sub_topic_name FROM tbl_sub_topics WHERE Id = {$sub_topic_id}");
        if(COUNT($data) > 0) {
            return array("status" => 200, "result" => $data);
        }
        return array("status" => 404, "result" => "No Result Found");
    }

    public function update(Request $request) {
        SubTopics::where('Id', '=', $request->get('sub_topic_id'))
            ->update([
                'sub_topic_name' => $request->get('sub_topic_name')
            ]);

        return response()->json(['status' => 200, 'result' => 'Update Successful']);
    }

    public function delete($sub_topic_id) {
        DB::SELECT("DELETE FROM tbl_sub_topics WHERE Id = {$sub_topic_id}");
        return response()->json(['status' => 200, 'result' => 'Sub Topic successfully deleted']);
    }

//--------------------------------------------------------
// GET DATA
//--------------------------------------------------------

    public function get_sub_topics($topic_id)
    {
        $data = DB::SELECT("
            SELECT * FROM tbl_sub_topics as st WHERE st.topic_uid = {$topic_id} ORDER BY st.Id ASC
        ");

        if(COUNT($data) > 0) {
            return array("status" => 200, "topic_id" => $topic_id, "result" => $data);
        }
        return array("status" => 404, "topic_id" => $topic_id, "result" => "No Result Found");
    }

    public function total_sub_topics_per_topic($topic_uid) {
        $data = SubTopics::where('topic_uid', '=', $topic_uid)->count();
        return $data;
    }

}
