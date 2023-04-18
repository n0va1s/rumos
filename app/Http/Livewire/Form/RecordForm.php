<?php

namespace App\Http\Livewire\Form;

use App\Models\Record;
use Livewire\Component;
use Livewire\Redirector;

class RecordForm extends Component
{
    public Record $record;
    public $isVisible = false;
    
    protected $listeners = ['show', 'destroy'];

    public function mount() : void
    {
        $this->record = new Record();
    }
    
    public function render()
    {
        return view('livewire.form.record-form');
    }

    public function show(Record $record) : void
    {
        if($record->presenter_id === 0){
            abort(404, "Ficha não encontrada. Fale com alguém da Comunicação");
        }
        //$record->load('person', 'presenter');
        $this->record = $record;
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
