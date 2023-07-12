<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RequestComponent extends Component
{
    public $requests = '';
    public $mode = 'Sent';
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($requests)
    {
        $this->requests = $requests;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.request');
    }
}
