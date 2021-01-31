<?php

namespace EmailTracker\App\Strateguies;

use Illuminate\Support\Facades\Mail;
use EmailTracker\App\Models\Scheduling;

class MailerCommandStrategy
{

    protected $instance, $scheduling;
    private $emails = [];

    public function setInstance($instance)
    {
        $this->instance = $instance;
        $this->instance->info('Se creo la instancia en la estrategia');
    }

    public function start($id)
    {
        $this->instance->info('Empezando tarea...');
        $scheduling = Scheduling::find($id);
        $this->list_emails($scheduling);
        $this->sendMailings($scheduling);
    }


    private function list_emails(Scheduling $scheduling)
    {
        foreach ($scheduling->email_list as $email_list) {
            foreach ($email_list->emails as $email) {
                if(!array_search($email->email, $this->emails)){
                    $this->emails[] = $email;
                }
            }
        }
    }

    private function sendMailings(Scheduling $scheduling)
    {
        foreach ($this->emails as $email) {
            Mail::send('mailings::'.$scheduling->html_email->view_path, ['dta'=>$email], function($msj) use($scheduling, $email){
                $msj->from($scheduling->html_email->from, $scheduling->html_email->name);
                $msj->subject($scheduling->html_email->subject);
                $msj->to($email->email);
            });
        }
    }

}