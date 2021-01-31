<?php
namespace EmailTracker\App\Models;

use Illuminate\Database\Eloquent\Model;

class SchedulingEmailList extends Model
{
    protected $fillable = [
        'scheduling_id',
        'email_list_id'
    ];
    public function __construct(array $attributes = array(), array $casts = array()){
        parent::__construct($attributes, $casts);
        $this->connection  =  config('email_tracker.connection');
    }


}