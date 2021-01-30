<?php
namespace EmailTracker\App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackerContent extends Model
{
    protected $connection = 'email_tracker';
    // public function __construct(){
    //     parent::__construct();
    //     $this->connection  =  config('email_tracker.connection');
    // }

    protected $fillable = [
        'email_id',
        'email_content_id',
        'scheduling_id',
        'visualizations'
    ];
}