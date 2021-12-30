<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Jobs extends Component
{

    public $message;
    public $list;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message,$list)
    {
        $this->message = $message;
        $this->list = $list;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.jobs');
    }
}
