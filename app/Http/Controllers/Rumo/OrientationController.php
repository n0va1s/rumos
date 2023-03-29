<?php

namespace App\Http\Controllers\Rumo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rumo\OrientationRequest;
use App\Models\Course;
use App\Models\Leader;
use App\Models\Option;
use App\Models\Person;

class OrientationController extends Controller
{
    public function __construct()
    {
    }

    public function create($id)
    {
        $course = Course::find($id);
        $roles = Option::where('group', "FCT")->get();
        $people = Person::with('address')->get();
        return view('rumo.orientation', compact('course', 'roles', 'people'));
    }

    public function store(OrientationRequest $request)
    {
        if (! $course = Course::find($request->input("course_id"))) {
            return redirect()->back()->with('error', 'Curso não encontrado. Tente novamente');
        }
        $validated = $this->validate($request, $request->rules());
        
        if (! $validated) {
            return redirect()->back()->with('error', 'Ops... não consegui salvar. Tente novamente');
        }

        Leader::create(
            [
                "role_id" => $validated['role_id'],
                "person_id" => $validated['person_id'],
                "information" => $validated['information'],
                "course_id" => $validated['course_id'],
            ]
        );

        $roles = Option::where('group', "FCT")->get();
        $people = Person::with('address')->get();
        return view('rumo.orientation', compact('course', 'roles', 'people'));
    }
}
