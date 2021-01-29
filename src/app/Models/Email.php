<?php
namespace EmailTracker\App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    public function __construct(){
        parent::__construct();
        $this->connection  =  config('email_tracker.connection');
    }

    protected $fillable = [
        'guid',
        'email',
        'name',
        'lastname'
    ];

    public function getRouteKeyName(){
        return 'guid';
    }
}