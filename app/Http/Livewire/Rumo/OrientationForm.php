<?php

namespace App\Http\Livewire\Rumo;

use App\Models\Leader;
use App\Models\Option;
use App\Models\Person;
use Livewire\Component;

class OrientationForm extends Component
{
    public Leader $leader;
    public bool $isVisible = false;
    
    protected $rules = [
        'leader.role_id' => 'required|numeric',
        'leader.person_id' => 'required|string',
        'leader.course_id' => 'required|string',
        'leader.information' => 'nullable|string|min:10',
    ];

    protected $listeners = ['openOrientationForm'];

    public function mount() : void
    {
        $this->leader = new Leader();
    }

    public function render()
    {
        return view('livewire.rumo.orientation-form')
            ->with('roles', Option::where('group', "FCT")->get())
            ->with('people', Person::all());
    }

    public function openOrientationForm(string $id) : void
    {
        $this->leader->course_id = $id;
        $this->isVisible = true;
    }

    public function closeOrientationForm() : void
    {
        $this->isVisible = false;
    }

    public function save() : void
    {
        $this->validate();
        $this->leader->save();
        session()->flash('success', 'Equipe de orientação salva com sucesso');
        $this->closeOrientationForm();
    }
}
