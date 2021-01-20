<?php
namespace EmailTracker\Traits;

use EmailTracker\Routes\RouteRegister;
use Illuminate\Support\Facades\Route;

trait RouterTrait
{
    public function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function ($router) {
            $router->all();
        };

        $defaultOptions = [
            'prefix' => 'email-traker',
            'namespace' => 'EmailTracker\App\Http\Controllers',
            'middlewares' => 'web'
        ];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegister($router));
        });
    }
}