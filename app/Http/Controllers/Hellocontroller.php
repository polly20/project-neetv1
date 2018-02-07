<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $data = array(
        "name" => "Charles",
        "work_days" => "27",
        "work_days_a_week" => "5",
      )

      return view('charles', compact('data'));
    }
}
