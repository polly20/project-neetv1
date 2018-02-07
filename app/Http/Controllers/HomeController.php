<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function Index() {
      return view('admin.dashboard');
    }

    public function Question_Subject() {
      return view('admin.question.subject');
    }
}
