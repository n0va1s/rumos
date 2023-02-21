<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SuccessMessage extends Component
{
    public $showingMessage = false;

    public function close()
    {
        session()->forget('success');
        return redirect()->route('groups.index');
    }

    public function render()
    {
        return view('livewire.success-message');
    }
}
