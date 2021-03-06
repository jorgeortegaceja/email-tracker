<?php
namespace EmailTracker\App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailContent extends Model
{

    public function __construct(){
        parent::__construct();
        $this->connection  =  config('email_tracker.connection');
    }

    protected $fillable = [
        'html_email_id',
        'conten_type_id',
        'guid',
        'resource',
    ];

    public function getRouteKeyName(){
        return 'guid';
    }
}