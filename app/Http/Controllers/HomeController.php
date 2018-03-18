<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Question;
use App\Answer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function Dashboard() {
      return view('admin.dashboard');
    }

    public function Question_Subject() {
      return view('admin.question.subject');
    }

    public function Question_Add($subject) {
      return view('admin.question.add_question');
    }
}
