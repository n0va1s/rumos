<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public string $resource;
    public array $columns;
    public string $edit;
    public string $delete;
    public string $search = '';

    public function render()
    {
        return view(
            'livewire.table', 
            [
                'items' => app("App\Models\\" . $this->resource)
                ->search($this->search)
                ->paginate(10)
            ]
        );
    }
}
