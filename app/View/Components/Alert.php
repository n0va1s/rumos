<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $title;
    public string $message;
    public string $color;

    public function __construct($title, $message, $color)
    {
        $this->title = $title;
        $this->message = $message;
        $this->color = $color;
    }

    public function render()
    {
        return view('components.alert');
    }
}
