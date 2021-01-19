<?php
namespace EmailsTraker\Facades;

use Illuminate\Support\Facades\Facade;

class TrakerEmail extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TrakerEmail';
    }
}