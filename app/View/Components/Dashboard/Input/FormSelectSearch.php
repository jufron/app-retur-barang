<?php

namespace App\View\Components\Dashboard\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSelectSearch extends Component
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $label;

    /**
     * @var array
     */
    public $model;

    /**
     * @var mixed
     */
    public mixed $selected;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $label, $model = [], mixed $selected = null)
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
        return view('components.dashboard.input.form-select-search');
    }
}
