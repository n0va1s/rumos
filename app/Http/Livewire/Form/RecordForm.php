<?php

namespace App\Http\Livewire\Form;

use App\Models\Record;
use Livewire\Component;
use Livewire\Redirector;

class RecordForm extends Component
{
    public Record $record;
    public $isAdmin = false;
    public $isVisible = false;    
    
    protected $listeners = [
        'open', 'destroy'
    ];

    public function mount(Record $record) : void
    {
        $this->record = $record;
        if(auth()->check()) {
            $this->record->community_id = auth()->user()->community_id;
            $this->isAdmin = auth()->user()->is_admin;
        }
    }
    
    public function render()
    {
        return view('livewire.form.record-form');
    }

    public function open(Record $record) : void
    {
        if($record->presenter_id === 0){
            abort(404, "Ficha não encontrada. Fale com alguém da Comunicação");
        }
        $this->record = $record;
        $this->record->community_id = auth()->user()->community_id;
        $this->isVisible = true;
    }

    public function close() : void
    {
        $this->isVisible = false;
    }

    public function aprove(Record $record) : Redirector
    {
        if($record->presenter_id === 0){
            abort(404, "Ficha não encontrada. Fale com alguém da Comunicação");
        }
        $record->update(['is_approved' => true]);
        session()->flash('success', 'Ficha aprovada com sucesso');
        $this->isVisible = false;
        return redirect()->route('records.index');
    }

    public function destroy(Record $record) : Redirector
    {
        if($record->presenter_id === 0){
            abort(404, "Ficha não encontrada. Fale com alguém da Comunicação");
        }
        $record->delete();
        session()->flash('success', 'Ficha excluída com sucesso');
        return redirect()->route('records.index');
    }
}
