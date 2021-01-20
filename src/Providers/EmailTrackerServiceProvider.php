<?php
namespace EmailTraker\Providers;

use EmailTraker\EmailTrackerHandler;
use Illuminate\Support\ServiceProvider;

class EmailTrackerServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('EmailTracker', function($app){
            return new EmailTrackerHandler($app['view']);
        });

        $this->publishes(
            [
                __DIR__.'\..\config\traker_email.php' => config_path('email_traker.php'),
            ]
        );
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