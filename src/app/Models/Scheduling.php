<?php
namespace EmailTracker\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    protected $fillable = [
        'guid',
        'status',
        'count_send',
        'user_id',
        'html_email_id',
        'campaign_name',
        'recurrent',
        'time_interval',
        'start_at',
        'finish_at'
    ];

    protected $casts = [
        'recurrent' => 'boolean',
        'status' => 'boolean',
    ];

    public function __construct(array $attributes = array(), array $casts = array())
    {
        parent::__construct($attributes, $casts);
        $this->connection  =  config('email_tracker.connection');
    }

    public function getRouteKeyName()
    {
        return 'guid';
    }

    public function email_list()
    {
        return $this->belongsToMany(EmailList::class);
    }

    public function html_email(){
        return $this->hasOne(HtmlEmail::class);
    }



}