<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Heading extends Component
{
    public string $title;
    public string $description;
    public string $label = '';
    public string $form = '';
    
    public function render() : View
    {
        return view('livewire.heading');
    }
}
