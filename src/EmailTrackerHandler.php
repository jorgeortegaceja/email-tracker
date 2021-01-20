<?php
namespace EmailTraker;

use EmailTraker\Traits\RouterTrait;
use Illuminate\View\Factory as View;

class EmailTrackerHandler
{
    use RouterTrait;

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
