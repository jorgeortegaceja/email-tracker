<?php
namespace EmailTracker\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    public function __construct(){
        parent::__construct();
        $this->connection  =  config('email_tracker.connection');
    }

    protected $fillable = [
        'guid',
        'status',
        'user_id',
        'html_email_id',
        'campaign_name',
        'recurrent',
        'time_interval',
        'start_shipping',
        'finish_shipments'
    ];

    protected $casts = [
        'recurrent' => 'boolean',
        'status' => 'boolean',
    ];

    public function getRouteKeyName(){
        return 'guid';
    }

    public function getStartShippingAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getFinishShipmentsAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

}