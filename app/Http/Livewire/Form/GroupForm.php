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
    public $isVisible = false;

    protected $rules = [
        'group.community_id' => 'required|numeric',
        'group.frequency_id' => 'required|numeric',
        'group.information' => 'required|string|min:10',
    ];

    protected $listeners = [
        'open'      => 'show',
        'edit'      => 'edit',
        'destroy'   => 'destroy',
    ];

    public function mount() : void
    {
        $this->group = new Group();
    }
    
    public function render() : View
    {
        return view('livewire.form.group-form')
            ->with('communities', Option::where('group', "SEC")->get())
            ->with('frequencies', Option::where('group', "FRQ")->get());
    }

    public function show() : void
    {
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
