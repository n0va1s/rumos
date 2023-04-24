<?php

namespace App\Http\Livewire\Components;

use App\Models\Option;
use Livewire\Component;

class CommunitySelect extends Component
{
    public $communities;
    public $community_id;
    public $isAdmin;
    public $isRequired = true;
    public $name = '';
    public $label = 'Secretariado (obrigatório)';
    
    public function mount() : void
    {
        $this->communities = Option::where('group', "SEC")->get();
        $this->community_id = auth()->user()->community_id;
        $this->isAdmin = auth()->user()->is_admin;
    }

    public function render()
    {
        return view('livewire.components.community-select');
    }
}
