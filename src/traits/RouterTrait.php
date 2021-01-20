<?php
namespace EmailTraker\Traits;

use EmailTraker\Routes\RouteRegister;

trait RouterTrait
{
    public function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function ($router) {
            $router->all();
        };

        $defaultOptions = [
            'prefix' => 'email-traker',
            'namespace' => 'EmailTraker\App\Http\Controllers',
        ];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegister($router));
        });
    }
}