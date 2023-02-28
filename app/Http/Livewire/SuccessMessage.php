<?php

namespace App\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;

class SuccessMessage extends Component
{
    public function close() : RedirectResponse
    {
        session()->forget('success');
        return back();
    }

    public function render() : View
    {
        return view('livewire.success-message');
    }
}
