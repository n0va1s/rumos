<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Heading extends Component
{
    public string $title;
    public string $description;
    public string $label = '';
    public string $route = '';
    
    public function __construct($title, $description, $label, $route)
    {
        $this->title = $title;
        $this->description = $description;
        $this->label = $label;
        $this->route = $route;
    }

    public function render()
    {
        return view('components.heading');
    }
}
