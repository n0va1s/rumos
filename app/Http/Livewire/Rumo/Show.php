<?php

namespace App\Http\Livewire\Rumo;

use App\Models\Course;
use Livewire\Component;

class Show extends Component
{
    public $members;
    public Course $course;
    public $isVisible = false;
    public $readyToLoad = false;

    protected $listeners = ['openRumo'];

    public function render()
    {
        if (!$this->readyToLoad) {
            return view('livewire.rumo.show')
                ->with('members', [])
                ->with('course', []);
        }
        return view('livewire.rumo.show')
            ->with('members', $this->members)
            ->with('course', $this->course);
    }

    public function loadingRumo(): void
    {
        $this->course = Course::with(
            ['leaders', 'teams', 'type', 'community']
        )->findOrFail($this->course->id);

        $this->members = $this->course->getMembers($this->course->id);
        $this->readyToLoad = true;
    }

    public function openRumo(Course $course_id): void
    {
        $this->course = $course_id;
        $this->isVisible = true;
    }
}
