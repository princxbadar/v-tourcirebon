<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MarkerCard extends Component
{
    public $mrkr;

    public function __construct($mrkr)
    {
        $this->mrkr = $mrkr;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.marker-card');
    }
}
