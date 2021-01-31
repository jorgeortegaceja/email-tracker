<?php
namespace EmailTracker\App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'guid',
        'email',
        'name',
        'lastname'
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
}