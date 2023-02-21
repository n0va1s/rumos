<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\Option;
use Livewire\Component;

class GroupForm extends Component
{
    public $group_id;
    public $community_id;
    public $frequency_id;
    public $information;
    public $showingModal = false;


    protected $rules = [
        'community_id' => 'required|numeric',
        'frequency_id' => 'required|numeric',
        'information' => 'required|string|min:10',
    ];

    protected $validationAttributes = [
        'community_id' => 'secretariado',
        'frequency_id' => 'frequência',
        'information' => 'informação',
    ];

    protected $listeners = [
        'showingModal' => 'open',
        'edit' => 'edit',
        'destroy' => 'destroy',
    ];
    
    public function render()
    {
        return view('livewire.group-form')
            ->with('communities', Option::where('group', "SEC")->get())
            ->with('frequencies', Option::where('group', "FRQ")->get());
    }

    public function open()
    {
        $this->showingModal = true;
    }

    public function edit($id){
        if(! $group = Group::find($id)){
            session()->flash('error', 'Ops... indentificado inválido. Fale com alguém da comunicação');
        }
        $this->group_id = $group->id;
        $this->community_id = $group->community_id;
        $this->frequency_id = $group->frequency_id;
        $this->information = $group->information;
        $this->showingModal = true;
    }

    public function save(){
        $validated = $this->validate();
        Group::updateOrCreate(
            [
                'id'   => $this->group_id,
            ],
            [
                'community_id' => $validated['community_id'],
                'frequency_id' => $validated['frequency_id'],
                'information' => $validated['information'],
            ],
 
        );
        session()->flash('success', 'Reunião de grupo salva com sucesso');
        $this->reset();
        return redirect()->route('groups.index');
    }

    public function destroy($id){
        if(! $group = Group::find($id)){
            session()->flash('error', 'Ops... indentificado inválido. Fale com alguém da comunicação');
        }
        $group->delete();
        session()->flash('success', 'Reunião de grupo excluída com sucesso');
        
        return redirect()->route('groups.index');
    }
}
