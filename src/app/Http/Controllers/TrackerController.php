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
            $tracker_content = TrackerContent::create([
                'email_id' => $email->id,
                'email_content_id' => $email_content->id,
                'scheduling_id' => $scheduling->id,
                'visualizations' => 1,
                'visualizations_dates' => [now()->format('d-m-Y H:i:s')]
            ]);
        }else{
            $dates = $tracker_content->visualizations_dates;
            array_push($dates, now()->format('d-m-Y H:i:s'));
            $tracker_content->update([
                'visualizations'=> (int)$tracker_content->visualizations+1,
                'visualizations_dates' => $dates
            ]);
        }

        return redirect($email_content->resource);
    }
}