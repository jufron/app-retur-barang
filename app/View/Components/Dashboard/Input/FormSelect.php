<?php

namespace App\View\Components\Dashboard\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSelect extends Component
{
    public $name;
    public $label;
    public $model;
    public $selected;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $model = [], $selected = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->model = $model;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.input.form-select');
    }
}
