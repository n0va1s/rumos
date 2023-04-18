<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LeverRequest;
use App\Models\Course;
use App\Models\Leader;
use App\Models\Lever;
use Illuminate\Http\Request;

class LeverController extends Controller
{
    public function index()
    {
        return view('admin.lever');
    }

    public function create()
    {
        $courses = Course::all();
        return view('public.lever-course', compact('courses'));
    }

    public function message(Course $course)
    {
        return view('public.lever-message')
        ->with('members', Leader::where('course_id', $course->id)->with('members'))
        ->with('course', $course);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, (new LeverRequest())->rules());
        Lever::create($data);
        return redirect()->route('levers.done');
    }

    public function done()
    {
        return view('public.lever-done');
    }
}
