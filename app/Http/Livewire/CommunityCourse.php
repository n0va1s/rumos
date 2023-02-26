<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lever;
use App\Models\Option;
use Livewire\Component;

class CommunityCourse extends Component
{
    public $communities;
    public $courses;
    public $levers;
    public $community = NULL;
    public $course = NULL;
  
    public function mount()
    {
        $this->communities = Option::where('group', "SEC")->get();
        $this->courses = collect();
        $this->levers = collect();
    }

    public function updatedCommunity($selected)
    {
        if (!is_null($selected)) {
            $this->courses = Course::where('community_id', $selected)->get();
        }
    }

    public function updatedCourse($selected)
    {
        if (!is_null($selected)) {
            $this->emit('courseSelected', $selected);
        }
    }
    
    public function render()
    {
        return view('livewire.community-course');
    }
}
