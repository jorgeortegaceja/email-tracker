<?php

namespace EmailTracker\App\Strateguies;
use Carbon\Carbon;
use EmailTracker\App\Models\Scheduling;
use Illuminate\Console\Scheduling\Schedule;
use EmailTracker\App\Console\Commands\MailerCommand;

class MailerTaskStrategy
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    private $schedule;

    /**
     * are all tasks to be scheduled.
     *
     */
    private $schedulings;

    /**
     * Create a new  instance.
     *
     * @return void
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
        $this->schedulings = Scheduling::where('status', 1)->get();
    }

    /**
     * create all tasks
     *
     * @return void
     */
    public function all()
    {
        foreach ($this->schedulings as $schedulings) {
            if($schedulings->recurrent){
                 $this->normalizeTaskRecurrent($schedulings);
            }else{
                $this->normalizeTask($schedulings);
            }
        }
    }


    /**
     * normalizes non-recurring tasks and updates the database
     *
     * @return void
     */
    private function normalizeTask(Scheduling $scheduling)
    {
        if($scheduling->start_at <= now()){
            $this->schedule->command(MailerCommand::class, [$scheduling->id])->{$scheduling->time_interval}()->sendOutputTo(storage_path().'/logs/email-traker.log');
            $scheduling->update(['status'=> 0, 'count_send' => 1]);
        }
    }

    /**
     * normalize recurring tasks and update the database
     *
     * @return void
     */
    private function normalizeTaskRecurrent(Scheduling $scheduling)
    {
        if($scheduling->start_shipping <= now() && $scheduling->finish_at > now()){
            $this->schedule->command(MailerCommand::class, [$scheduling->id])->{$scheduling->time_interval}()->sendOutputTo(storage_path().'/logs/email-traker.log');
              $scheduling->update(['count_send' => $scheduling->count_send + 1]);
        }else{
            $scheduling->update(['status'=> 0]);
        }
    }

}