<?php

namespace App\Http\Livewire\Components;

use App\Models\Course;
use App\Models\Option;
use Illuminate\View\View;
use Livewire\Component;

class CommunityCourse extends Component
{
    public $communities;
    public $courses;
    public $community;
    public $course;
    public bool $isAdmin;

    /*protected $queryString = [
        'community' => ['except' => '', 'as' => 'cm'],
        'course' => ['except' => '', 'as' => 'cr'],
    ];*/
  
    public function mount() : void
    {
        $this->communities = Option::where('group', "SEC")->get();
        
        if(! $this->isAdmin = auth()->user()->is_admin){
            $this->community = auth()->user()->community_id;
        }
        $this->courses = Course::where('community_id',  auth()->user()->community_id)->get();
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
        return view('livewire.components.community-course');
    }
}
