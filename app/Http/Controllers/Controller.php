<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test_email() {
      $type = "layout.mail.sample";

      $data = array(
        'to' => "me@kpa21.info",
        'name' => "King Paulo Aquino",
        'subject' => "System Testing",
        'body' => "This is a test email from NEET101 Program",
      );

      Mail::send($type, $data, function($message) use ($data)
      {
          $message
              ->to($data["to"], $data["name"])
              ->subject($data["subject"]);
      });

    }
}
