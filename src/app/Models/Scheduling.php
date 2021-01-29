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

    protected $casts = [
        'recurrent' => 'boolean',
    ];

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

    public function getRecurrentAttribute($value)
    {
        return $value ? 'si':'no';
    }

    public function getTimeIntervalAttribute($value)
    {
        switch ($value) {
            case 'everyDay':
                return 'cada día';
                break;

            default:
                # code...
                break;
        }
    }

}
