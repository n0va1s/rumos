<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Card extends Component
{
    //Model name
    public string $resource;
    //Model key 
    public string $field;
    //Data to mount card list
    protected $data;
    protected $listeners = ['courseSelected' => 'setCourse'];

    public function mount() : void
    {
        $this->data = collect();        
    }
    
    public function setCourse($id) : void
    {
        $this->data = app(
            "App\Models\\" . $this->resource
        )->where(
            $this->field,
            "=",
            $id
        )->paginate(10);
    }

    public function render() : View
    {
        return view(
            'livewire.card',
            [
                'items' => $this->data
            ]
        );
    }
}
