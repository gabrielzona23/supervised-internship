<?php

namespace App\View\Components\Alerts;

use Illuminate\View\Component;

class Info extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $problem;
    public function __construct($problem)
    {
        $this->problem = $problem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alerts.info');
    }
}
