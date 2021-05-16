<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Student extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $programs, $special_needs;
    public function __construct($programs, $specialNeeds)
    {
        $this->programs = $programs;
        $this->special_needs = $specialNeeds;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.student');
    }
}
