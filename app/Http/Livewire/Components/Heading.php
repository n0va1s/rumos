<?php

namespace App\Http\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class Heading extends Component
{
    public string $title;
    public string $description;
    public string $label = '';
    public string $form = '';
    public string $event = '';
    
    public function render() : View
    {
        return view('livewire.components.heading');
    }
}
