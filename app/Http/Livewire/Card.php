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

    protected $data;
    protected $listeners = ['courseSelected' => 'setCourse'];

    public function mount()
    {
        $this->data = collect();
    }

    public function render(): View
    {
        return view(
            'livewire.card',
            [
                'items' => $this->data
            ]
        );
    }

    public function setCourse($id): void
    {
        $this->data = app(
            "App\Models\\" . $this->resource
        )->where(
            $this->field,
            "=",
            $id
        )->paginate(10);
    }
}
