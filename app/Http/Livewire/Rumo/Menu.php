<?php

namespace App\Http\Livewire\Rumo;

use App\Models\Course;
use Livewire\Component;

class Menu extends Component
{
    //Model name
    public string $resource;
    //Model key 
    public string $field;
    public Course $course;
    
    protected $listeners = [
        'courseSelected' => 'setCourse',
        'closeRumoForm' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.rumo.menu');
    }

    public function setCourse(Course $id) : void
    {
        $this->course = $id;
    }
}
