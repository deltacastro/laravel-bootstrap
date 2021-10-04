<?php

namespace App\View\Components\bootstrap\modal;

use Illuminate\View\Component;

class confirmation extends Component
{
    public $parentElem;
    public $elem;
    public $ajaxComponent;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parentElem = '#ajax_div', $elem = '.eliminar', $ajaxComponent = false)
    {
        $this->parentElem = $parentElem;
        $this->elem = $elem;
        $this->ajaxComponent = $ajaxComponent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bootstrap.modal.confirmation');
    }
}
