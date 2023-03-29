<?php

namespace App\Http\Livewire\Rumo;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoForm extends Component
{
    use WithFileUploads;

    public $file;
    public $course_id;
    public $isVisible = false;

    protected $rules = [
        'file' => 'required|image|max:2048',
        'course_id' => 'required|string',
    ];

    protected $listeners = ['openPhotoForm'];
    
    public function render()
    {
        return view('livewire.rumo.photo-form');
    }

    public function openPhotoForm(string $id): void
    {
        $this->course_id = $id;
        $this->isVisible = true;
    }

    public function closePhotoForm(): void
    {
        $this->isVisible = false;
    }

    public function save() : void
    {
        $this->validate();
        $name = $this->file->store("cursos");
        Photo::create([
            'course_id' => $this->course_id,
            'url' => $name,
        ]);
        session()->flash('success', 'Foto salva com sucesso');
        $this->closePhotoForm();
    }
}
