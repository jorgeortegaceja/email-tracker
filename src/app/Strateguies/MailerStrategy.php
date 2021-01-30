<?php

namespace EmailTracker\App\Strateguies;

use EmailTracker\App\Models\Scheduling;

class MailerStrategy
{

    protected $instance, $schedulings, $attributes;

    public function __construct(){
        $this->attributes = ['id', 'guid', 'status', 'html_email_id', 'campaign_name', 'recurrent', 'time_interval', 'start_shipping', 'finish_shipments'];
    }

    public function setInstance($instance){
        $this->instance = $instance;
        $this->instance->info('Se creo la instancia en la estrategia');
    }

    public function start(){
        $this->instance->info('Empezando mapeo de tareas...');
        $this->getScheduls();
        $this->instance->table($this->attributes, $this->schedulings->toArray());
        $this->initTask();
    }

    private function getScheduls(){
       $this->schedulings = Scheduling::where('status', 1)->select($this->attributes)->get();
    }

    private function initTask(){
        foreach ($this->schedulings as $scheduling) {
            if($scheduling->recurrent){

            }else{
                $this->prepareTask($scheduling);
            }
        }
    }

    private function prepareTask(Scheduling $scheduling){
          $this->instance->info($scheduling);
    }

}