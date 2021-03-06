<?php

namespace App\View\Components\Alerts;

use Illuminate\View\Component;

class ValidationErrors extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $errors;
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alerts.validation-errors');
    }
}
