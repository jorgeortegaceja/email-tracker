<?php

namespace EmailTracker\Routes;


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
        $this->forEmailTracker();
    }

    /**
     * Register the routes needed for authorization.
     *
     * @return void
     */
    public function forDashboard()
    {
        $this->router->group([], function ($api) {
            $api->resource('schedulings', 'SchedulingController');
        });
    }



    /**
     *  Register the routes for the email tracker
     *
     *  @return void
     */

     public function forEmailTracker(){
         $this->router->group(['prefix'=>''], function($tracker){
            $tracker->get('/read/scheduling/{scheduling}/email/{email}/content/{email_content}', 'TrackerController@route_read');
         });
     }

}