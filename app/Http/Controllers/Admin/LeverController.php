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
        //$communities = Option::where('group', "SEC")->get();
        //return view('lever.index', compact('communities'));
        return view('admin.lever');
    }

    public function create()
    {
        $courses = Course::all();
        return view('public.lever-course', compact('courses'));
    }

    public function message($id)
    {
        $members = Leader::where('course_id', $id)->with('members');
        $course = Course::find($id);
        return view('public.lever-message', compact('members', 'course'));
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
