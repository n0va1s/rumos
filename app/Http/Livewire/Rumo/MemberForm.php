<?php

namespace App\Http\Livewire\Rumo;

use App\Models\Leader;
use App\Models\Member;
use App\Models\Person;
use Livewire\Component;

class MemberForm extends Component
{
    public Member $member;
    public $leaders;
    public $members;
    public $readyToLoad = false;
    public $isVisible = false;

    protected $rules = [
        'member.course_leader_id' => 'required|numeric',
        'member.person_id' => 'required|string',
        "member.information" => 'nullable|string',
    ];

    protected $listeners = ['openMemberForm'];

    public function mount(): void
    {
        $this->member = new Member();
        $this->leaders = collect();
        $this->members = collect();
    }

    public function render()
    {
        if(!$this->readyToLoad) {
            return view('livewire.rumo.member-form')
            ->with('leaders', [])
            ->with('members', []);
        }
        return view('livewire.rumo.member-form')
            ->with('leaders', $this->leaders)
            ->with('members', $this->members);
    }

    public function openMemberForm(string $id): void
    {
        $this->member->course_id = $id;
        $this->isVisible = true;
    }

    public function closeMemberForm(): void
    {
        $this->isVisible = false;
    }

    public function loadingData(): void
    {
        $this->leaders = Leader::where('course_id', $this->member->course_id);
        $this->members = Person::where('user.community_id',auth()->user()->community_id);
        $this->readyToLoad = true;
    }

    public function save(): void
    {
        $this->validate();
        $this->member->save();
        session()->flash('success', 'Cursista salvo(a) com sucesso');
        $this->closeMemberForm();
    }
}
