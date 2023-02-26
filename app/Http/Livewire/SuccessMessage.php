<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SuccessMessage extends Component
{
    public function close()
    {
        session()->forget('success');
        return back();
    }

    public function render()
    {
        return view('livewire.success-message');
    }
}
