<?php

namespace App\Http\Livewire\Form;

use App\Models\Course;
use App\Models\Option;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class CourseForm extends Component
{
    public Course $course;
    public bool $isVisible = false;
    
    protected $rules = [
        "course.community_id" => 'required|numeric',
        "course.type_id" => 'required|numeric',
        "course.number" => 'required|numeric',
        "course.starts_at" => 'required|date',
        "course.ends_at" => 'required|date',
        "course.information" => 'nullable|string',
    ];

    protected $listeners = ['open'];

    public function render()
    {
        return view('livewire.form.course-form')
            ->with('communities', Option::where('group', "SEC")->get())
            ->with('types', Option::where('group', "GND")->get());
    }

    public function open(): void
    {
        $this->isVisible = true;
    }

    public function close() : void
    {
        $this->isVisible = false;
    }

    public function save()
    {
        $this->validate();
        $this->course->save();
        session()->flash('success', 'Curso salvo(a) com sucesso');
        $this->close();
    }
}
