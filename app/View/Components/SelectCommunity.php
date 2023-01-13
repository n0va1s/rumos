<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectCommunity extends Component
{
    public $label;
    public $options;
    public $selected;
    public $disabled;
    
    public function __construct($label, $options, $selected, $disabled)
    {
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.select-community');
    }
}
