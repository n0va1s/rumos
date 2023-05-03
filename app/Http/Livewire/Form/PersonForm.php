<?php

namespace App\Http\Livewire\Form;

use App\Models\Option;
use App\Models\Person;
use Livewire\Redirector;
use Livewire\Component;

class PersonForm extends Component
{
    public Person $person;
    public $genders;
    public $ufs;
    public $isVisible = false;
    public $isAdmin = false;
    
    
    protected $rules = [
        'person.first_name' => 'required|string|max:100',
        'person.last_name' => 'required|string|max:100',
        'person.birth_at' => 'required|date|before:18 years ago',
        'person.gender_id' => 'required|numeric',
        'person.email' => 'required|e-mail|min:5',
        'person.phone' => 'required|numeric|min:11',
        'person.social' => 'nullable|url',
        'person.address.state_id' => 'nullable|numeric',
        'person.address.description' => 'nullable|string',
        'person.address.number' => 'nullable|numeric',
        'person.address.city' => 'nullable|string|min:5',
        'person.address.zipcode' => 'nullable|string|min:8',
    ];

    protected $listeners = [
        'open','edit','destroy'
    ];

    public function mount(Person $person) : void
    {
        $this->person = $person;
        $this->genders = Option::where('group', "GND")->get();
        $this->ufs = Option::where('group', "UFS")->get();
        $this->person->community_id = auth()->user()->community_id;
        $this->isAdmin = auth()->user()->is_admin;
        
    }

    public function render()
    {
        return view('livewire.form.person-form');
    }

    public function open() : void
    {
        $this->person->community_id = auth()->user()->community_id;
        $this->isVisible = true;
    }

    public function closePersonForm() : void
    {
        $this->isVisible = false;
    }

    public function edit($id) : void
    {
        if(! $this->person = Person::find($id)){
            abort(404, "Pessoa não encontrada. Fale com alguém da Comunicação");
        }
        $this->isVisible = true;
    }

    public function save() : Redirector
    {
        $this->validate();
        $this->person->save();
        session()->flash('success', 'Pessoa salva com sucesso');
        $this->closePersonForm();
        return redirect()->route('people.index');
    }

    public function destroy($id) : Redirector
    {
        if(! $person = Person::find($id)){
            abort(404, "Reunião de grupo não encontrada. Fale com alguém da Comunicação");
        }
        $person->delete();
        session()->flash('success', 'Pessoa excluída com sucesso');
        
        return redirect()->route('people.index');
    }
}
