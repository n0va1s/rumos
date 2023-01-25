<?php

namespace App\Http\Controllers\Lever;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LeverRequest;
use App\Models\Course;
use App\Models\Leader;
use App\Models\Lever;
use App\Models\Member;
use Illuminate\Http\Request;

class SendLeverController extends Controller
{
    public function create()
    {
        $courses = Course::all();
        return view('lever.new', compact('courses'));
    }

    public function message($id)
    {
        $members = Leader::where('course_id', $id)->with('members');
        $course = Course::find($id);
        return view('lever.message', compact('members', 'course'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, (new LeverRequest)->rules());
        Lever::create($data);
        return redirect()->route('lever.new')->with('success', 'Alavanca enviada! Obrigado');
    }
}
