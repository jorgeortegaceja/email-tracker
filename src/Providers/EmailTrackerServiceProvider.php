<?php
namespace EmailTracker\Providers;

use EmailTracker\EmailTrackerHandler;
use Illuminate\Support\ServiceProvider;
use EmailTracker\App\Console\Commands\MailerCommand;

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
        if ($this->app->runningInConsole()) {
            $this->commands([
                MailerCommand::class
            ]);
        }
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'email_tracker');
        $this->loadViewsFrom(resource_path().'/mailings', 'mailings');

    }

}