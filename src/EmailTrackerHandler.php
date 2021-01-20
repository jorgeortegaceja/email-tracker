<?php
namespace EmailsTraker;

use Illuminate\View\Factory as View;

class EmailTrackerHandler
{
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