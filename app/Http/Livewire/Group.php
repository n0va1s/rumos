<?php

namespace App\Http\Livewire;

use App\Models\Group as GroupModel;
use App\Models\Option;
use Livewire\Component;
use Livewire\WithPagination;

class Group extends Component
{
    use WithPagination;
    
    public $group_id;
    public $community_id;
    public $frequency_id;
    public $information;
    public $search = '';
    public $showingModal = false;
    public $showingConfirmation = false;

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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.group')
        ->with('groups', GroupModel::paginate(5))
        ->with('communities', Option::where('group', "SEC")->get())
        ->with('frequencies', Option::where('group', "FRQ")->get());
    }
    
    public function edit($id){
        if(! $group = GroupModel::find($id)){
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
        $group = GroupModel::updateOrCreate(
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
        return redirect()->to('/groups');
    }

    public function destroy($id){
        if(! $group = GroupModel::find($id)){
            session()->flash('error', 'Ops... indentificado inválido. Fale com alguém da comunicação');
        }
        $group->delete();
        session()->flash('success', 'Reunião de grupo excluída com sucesso');
        
        return redirect()->to('/groups');
    }
}
