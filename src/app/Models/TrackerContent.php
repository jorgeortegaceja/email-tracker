<?php
namespace EmailTracker\App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackerContent extends Model
{
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'email_tracker';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_id',
        'email_content_id',
        'scheduling_id',
        'visualizations',
        'visualizations_dates'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'visualizations_dates'=> 'array'
    ];

    public function __construct(array $attributes = array(), array $casts = array()){
        parent::__construct($attributes, $casts);
        $this->connection  =  config('email_tracker.connection');
    }



}