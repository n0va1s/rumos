<?php

namespace App\Http\Livewire\Rumo;

use App\Models\Option;
use App\Models\Person;
use App\Models\Team;
use Livewire\Component;

class SupportForm extends Component
{
    public Team $team;
    public $teams;
    public $people;
    public $readyToLoad = false;
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
        $this->teams = collect();
        $this->people = collect();
    }

    public function render()
    {
        if(!$this->readyToLoad){
            return view('livewire.rumo.support-form')
            ->with('teams', [])
            ->with('people', []);
        }
        return view('livewire.rumo.support-form')
        ->with('teams', $this->teams)
        ->with('people', $this->people);
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

    public function loadingData(): void
    {
        $this->teams = Option::where('group', "TEM")->get();
        $this->people = Person::where('community_id', auth()->user()->community_id);
        $this->readyToLoad = true;
    }

    public function save() : void
    {
        $this->validate();
        $this->team->save();
        session()->flash('success', 'Equipe de orientação salva com sucesso');
        $this->closeSupportForm();
    }
}
