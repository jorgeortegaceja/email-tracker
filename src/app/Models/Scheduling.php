<?php
namespace EmailTracker\App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{

    public function __construct(){
        parent::__construct();
        $this->connection  =  config('email_tracker.connection');
    }

}