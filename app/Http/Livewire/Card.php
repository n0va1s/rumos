<?php

namespace App\Http\Livewire;

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

    public function mount()
    {
        $this->data = collect();        
    }
    
    public function setCourse($id)
    {
        $this->data = app(
            "App\Models\\" . $this->resource
        )->where(
            $this->field,
            "=",
            $id
        )->paginate(10);
    }

    public function render()
    {
        return view(
            'livewire.card',
            [
                'items' => $this->data
            ]
        );
    }
}
