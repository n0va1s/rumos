<?php

namespace App\Http\Controllers\Rumo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rumo\MemberRequest;
use App\Models\Course;
use App\Models\Leader;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function create($id)
    {
        $course = Course::find($id);
        $leaders = (new Leader)->getMonitors($id);
        $members = (new Course)->getMembers($id);
        return view('rumo.member', compact('course', 'leaders', 'members'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, (new MemberRequest())->rules());
        $member = Member::create($data);
        return redirect()->route(
            'rumos.member.create', 
            $member->monitor->course_id
        )->with('success', 'Cursista cadastrado com sucesso');
    }
}
