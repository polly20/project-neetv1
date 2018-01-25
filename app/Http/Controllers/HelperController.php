<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    //
    public function __construct($prefix) {
      HelperController::$sampleA = "{$prefix}";
  	}

    public static $sampleA;
    public static $sampleB;

    public function get_sample_a($name) {
      return $name . " " . HelperController::$sampleA;
    }
}
