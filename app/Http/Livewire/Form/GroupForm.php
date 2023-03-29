<?php

namespace App\Http\Livewire\Form;

use App\Models\Group;
use App\Models\Option;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;

class GroupForm extends Component
{
    public $group_id;
    public $community_id;
    public $frequency_id;
    public $information;
    public $isVisible = false;

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
        'open'      => 'show',
        'edit'      => 'edit',
        'destroy'   => 'destroy',
    ];
    
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

    public function edit($id) : void
    {
        if(! $group = Group::find($id)){
            abort(404, "Reunião de grupo não encontrada. Fale com alguém da Comunicação");
        }
        $this->group_id = $group->id;
        $this->community_id = $group->community_id;
        $this->frequency_id = $group->frequency_id;
        $this->information = $group->information;
        $this->isVisible = true;
    }

    public function save() : RedirectResponse
    {
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
        return redirect()->route('groups.index');
    }

    public function destroy($id) : RedirectResponse
    {
        if(! $group = Group::find($id)){
            abort(404, "Reunião de grupo não encontrada. Fale com alguém da Comunicação");
        }
        $group->delete();
        session()->flash('success', 'Reunião de grupo excluída com sucesso');
        
        return redirect()->route('groups.index');
    }
}
