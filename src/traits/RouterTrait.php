<?php
namespace EmailsTraker\Traits;

/**
 *
 */
trait RouterTrait
{
    public function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function ($router) {
            $router->all();
        };

        $defaultOptions = [
            'prefix' => 'email-traker',
            'namespace' => 'EmailsTraker\App\Http\Controllers',
        ];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }
}