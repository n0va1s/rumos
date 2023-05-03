<?php

namespace App\Http\Livewire\Form;

use App\Models\Course;
use App\Models\Option;
use Livewire\Component;

class CourseForm extends Component
{
    public Course $course;
    public $communities;
    public $types;
    public $isAdmin = false;
    public $isVisible = false;
    
    protected $rules = [
        "course.community_id" => 'required|numeric',
        "course.type_id" => 'required|numeric',
        "course.number" => 'required|numeric',
        "course.starts_at" => 'required|date',
        "course.ends_at" => 'required|date',
        "course.information" => 'nullable|string',
    ];

    protected $listeners = ['open'];

    public function mount(Course $course) : void
    {
        $this->course = $course;
        $this->communities = Option::where('group', "SEC")->get();
        $this->types = Option::where('group', "GND")->get();
        $this->course->community_id = auth()->user()->community_id;
        $this->isAdmin = auth()->user()->is_admin;
    }

    public function render()
    {
        return view('livewire.form.course-form');
    }

    public function open(): void
    {
        $this->course->community_id = auth()->user()->community_id;
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
