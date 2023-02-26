<?php

namespace App\Http\Livewire;

use App\Models\Group as GroupModel;
use App\Models\Option;
use Livewire\Component;
use Livewire\WithPagination;

class Group extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.group')
        ->with('groups', GroupModel::paginate(5))
        ->with('communities', Option::where('group', "SEC")->get())
        ->with('frequencies', Option::where('group', "FRQ")->get());
    }
}
