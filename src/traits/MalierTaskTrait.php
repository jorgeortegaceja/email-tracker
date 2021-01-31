<?php

namespace EmailTracker\Traits;

use Illuminate\Console\Scheduling\Schedule;
use EmailTracker\App\Strateguies\MailerTaskStrategy;

trait MalierTaskTrait
{
    public function tasks(Schedule $schedule)
    {
        $task = new MailerTaskStrategy($schedule);
        return $task->all();
    }
}