<?php
namespace EmailTracker;

use EmailTracker\Traits\MalierTaskTrait;
use EmailTracker\Traits\RouterTrait;
use Illuminate\View\Factory as View;

class EmailTrackerHandler
{
    use RouterTrait, MalierTaskTrait;

    /**
     *  @var View
     */
    private $view;

    public function __construct(View $view){
       $this->view = $view;
    }

    public function show_view($view){
        return $this->view->make($view);
    }

}