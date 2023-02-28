<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
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
    public string $sortBy= 'id';
    public bool $sortAsc= true;

    public function resetSearch() : void
    {
        $this->reset('search');
    }
    
    public function sortBy($name) : void
    {
        $this->sortBy = $name;
        $this->sortAsc = !$this->sortAsc;
    }

    public function render() : View
    {
        return view(
            'livewire.table',
            [
                'items' => app("App\Models\\" . $this->resource)
                    ->search($this->search)
                    ->sort($this->sortBy, $this->sortAsc)
                    ->paginate(5)
            ]
        );
    }
}
