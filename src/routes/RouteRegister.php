<?php

namespace EmailTraker\Routes;


use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegister
{

    /**
     * The router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new route registrar instance.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for transient tokens, clients, and personal access tokens.
     *
     * @return void
     */
    public function all()
    {
        $this->forDashboard();
        // $this->forEmailTraker();
    }

    /**
     * Register the routes needed for authorization.
     *
     * @return void
     */
    public function forDashboard()
    {
        $this->router->group(['middleware' => ['web']], function ($router) {

        });
    }



}