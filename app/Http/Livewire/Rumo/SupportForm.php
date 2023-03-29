<?php

namespace App\Http\Livewire\Rumo;

use App\Models\Option;
use App\Models\Person;
use App\Models\Team;
use Livewire\Component;

class SupportForm extends Component
{
    public Team $team;
    public $isVisible = false;

    protected $rules = [
        "team.course_id" => 'required|string',
        "team.team_id" => 'required|numeric',
        "team.person_id" => 'required|string',
        "team.information" => 'nullable|string',
    ];

    protected $listeners = ['openSupportForm'];

    public function mount() : void
    {
        $this->team = new Team();
    }

    public function render()
    {
        return view('livewire.rumo.support-form')
        ->with('teams', Option::where('group', "TEM")->get())
        ->with('people', Person::all());
    }

    public function openSupportForm(string $id) : void
    {
        $this->team->course_id = $id;
        $this->isVisible = true;
    }

    public function closeSupportForm() : void
    {
        $this->isVisible = false;

    }

    public function save() : void
    {
        $this->validate();
        $this->team->save();
        session()->flash('success', 'Equipe de orientação salva com sucesso');
        $this->closeSupportForm();
    }
}
