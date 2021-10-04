<?php

namespace App\View\Components\bootstrap\offcanvas;

use Illuminate\View\Component;

class general extends Component
{

    public $qselector;
    public $parentElem;
    public $ajaxComponent;
    public $offcanvasParentClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($offcanvasParentClass, $parentElem, $qselector, $ajaxComponent = false)
    {
        $this->qselector = $qselector;
        $this->parentElem = $parentElem;
        $this->ajaxComponent = $ajaxComponent;
        $this->offcanvasParentClass = $offcanvasParentClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bootstrap.offcanvas.general');
    }
}
