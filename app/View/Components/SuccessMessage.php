<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class SuccessMessage extends Component
{
    public $message;

    public function __construct()
    {
        //Error message below of each element on the red color
        $this->message  = Session::has('success') ? Session::get('success') : '';
    }

    public function render()
    {
        return view('components.success-message', 
            [
                'message'=>$this->message
            ]
        );
    }
}
