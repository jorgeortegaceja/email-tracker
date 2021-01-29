<?php

namespace EmailTracker\App\Http\Controllers;

use EmailTracker\App\Models\Email;
use EmailTracker\App\Models\Scheduling;
use EmailTracker\App\Models\TrackerContent;

class TrackerController
{
    public function route_read(Email $email){//, TrackerContent $traker_content, Scheduling $scheduling = null){
       
        // dd($email, $traker_content, $scheduling);
        dd($email->email);
    }
}
