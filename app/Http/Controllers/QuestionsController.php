<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
    }

    public function index() {

        $get_subjects = new SubjectController();
        $subjects = $get_subjects->get_subjects();

        $get_syllabus = new SyllabusController();
        $syllabus = $get_syllabus->get_syllabus();

        return view('admin.question.questions', compact('subjects', 'syllabus'));
    }


}
