<?php
namespace EmailTracker\App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    protected $fillable = [
        'name'
    ];

    public function __construct(array $attributes = array(), array $casts = array())
    {
        parent::__construct($attributes, $casts);
        $this->connection  =  config('email_tracker.connection');
    }

    public function emails()
    {
      return  $this->belongsToMany(Email::class);
    }
}