<?php

namespace App\Http\Livewire\Form;

use App\Models\Group;
use App\Models\Option;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class GroupForm extends Component
{
    public Group $group;
    public $communities;
    public $frequencies;
    public bool $isAdmin = false;
    public bool $isVisible = false;

    protected $rules = [
        'group.community_id' => 'required|numeric',
        'group.frequency_id' => 'required|numeric',
        'group.information' => 'required|string|min:10',
    ];

    protected $listeners = [
        'open', 'edit', 'destroy',
    ];

    public function mount(Group $group) : void
    {
        $this->group = $group;
        $this->communities = Option::where('group', "SEC")->get();
        $this->frequencies = Option::where('group', "FRQ")->get();
        $this->group->community_id = auth()->user()->community_id;
        $this->isAdmin = auth()->user()->is_admin;
    }
    
    public function render() : View
    {
        return view('livewire.form.group-form');
    }

    public function open() : void
    {
        $this->group->community_id = auth()->user()->community_id;
        $this->isVisible = true;
    }

    public function close() : void
    {
        $this->isVisible = false;
    }

    public function edit($id) : void
    {
        if(! $this->group = Group::find($id)){
            abort(404, "Reunião de grupo não encontrada. Fale com alguém da Comunicação");
        }
        $this->isVisible = true;
    }

    public function save() : Redirector
    {
        $this->validate();
        $this->group->save();
        session()->flash('success', 'Reunião de grupo salva com sucesso');
        $this->close();
        return redirect()->route('groups.index');
    }

    public function destroy($id) : Redirector
    {
        if(! $group = Group::find($id)){
            abort(404, "Reunião de grupo não encontrada. Fale com alguém da Comunicação");
        }
        $group->delete();
        session()->flash('success', 'Reunião de grupo excluída com sucesso');
        return redirect()->route('groups.index');
    }
}
