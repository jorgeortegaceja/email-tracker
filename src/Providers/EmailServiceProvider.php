<?php
namespace EmailsTraker\Providers;

use EmailsTraker\EmailTrackerHandler;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{

    public function register()
    {
        \App::bind('EmailTraker', function($app){
            return new EmailTrackerHandler($app['view']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

}