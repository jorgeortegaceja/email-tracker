<?php
namespace EmailTracker\Providers;

use EmailTracker\EmailTrackerHandler;
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
                __DIR__.'\..\config\email_tracker.php' => config_path('email_tracker.php'),
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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'email_tracker');

    }

}
