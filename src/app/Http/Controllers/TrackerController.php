<?php

namespace EmailTracker\App\Http\Controllers;

use EmailTracker\App\Models\Email;
use EmailTracker\App\Models\Scheduling;
use EmailTracker\App\Models\EmailContent;
use EmailTracker\App\Models\TrackerContent;

class TrackerController
{
    public function route_read(Scheduling $scheduling, Email $email, EmailContent $email_content){

        $tracker_content = TrackerContent::where('email_id', $email->id)
                        ->where('email_content_id', $email_content->id)
                        ->where('scheduling_id', $scheduling->id)
                        ->first();

        if( $tracker_content == null){

            TrackerContent::create([
                'email_id' => $email->id,
                'email_content_id' => $email_content->id,
                'scheduling_id' => $scheduling->id,
                'visualizations' => 1
            ]);


        }else{
            $tracker_content->fill(['visualizations'=> $tracker_content->visualizations++]);

        }

        return response()->json([$tracker_content]);
        // return redirect($email_content->resource);
    }
}