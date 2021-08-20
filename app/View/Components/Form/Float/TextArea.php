<?php

namespace App\View\Components\Form\Float;

use Illuminate\View\Component;

class TextArea extends Component
{
    public $id;
    public $label;
    public $errorValidator;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $label, $errorValidator = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->errorValidator = $errorValidator;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $errorClass = '';
        return view('components.form.text-area', compact('errorClass'));
    }
}
