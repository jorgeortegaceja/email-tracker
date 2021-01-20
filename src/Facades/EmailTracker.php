<?php
namespace EmailTracker\Facades;

use Illuminate\Support\Facades\Facade;

class EmailTracker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'EmailTracker';
    }
}