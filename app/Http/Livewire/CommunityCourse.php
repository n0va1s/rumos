<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Option;
use Illuminate\View\View;
use Livewire\Component;

class CommunityCourse extends Component
{
    public $communities;
    public $courses;
    public $levers;
    public $community = NULL;
    public $course = NULL;
  
    public function mount() : void
    {
        $this->communities = Option::where('group', "SEC")->get();
        $this->courses = collect();
        $this->levers = collect();
    }

    public function updatedCommunity($selected) : void
    {
        if (!is_null($selected)) {
            $this->courses = Course::where('community_id', $selected)->get();
        }
    }

    public function updatedCourse($selected) : void
    {
        if (!is_null($selected)) {
            $this->emit('courseSelected', $selected);
        }
    }
    
    public function render() : View
    {
        return view('livewire.community-course');
    }
}
