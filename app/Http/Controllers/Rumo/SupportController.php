<?php

namespace App\Http\Controllers\Rumo;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Option;
use App\Models\Person;
use App\Models\Team;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct()
    {
    }

    public function create($id)
    {
        $course = Course::find($id);
        $teams = Option::where('group', "TEM")->get();
        $people = Person::with('address')->get();
        return view('rumo.support', compact('course', 'teams', 'people'));
    }

    public function store(Request $request)
    {
        if (! $course = Course::find($request->input("course_id"))) {
            return redirect()->back()->with('error', 'Curso não encontrado. Tente novamente');
        }
        
        $validated = $request->validate(
            [
                "course_id" => ['required', 'string'],
                "team_id" => ['required', 'numeric'],
                "person_id" => ['required', 'string'],
                "information" => ['nullable', 'string'],
            ]
        );

        if (! $validated) {
            return redirect()->back()->with('error', 'Ops... não consegui salvar. Tente novamente');
        }

        Team::create(
            [
                "course_id" => $validated['course_id'],
                "team_id" => $validated['team_id'],
                "person_id" => $validated['person_id'],
                "information" => $validated['information'],
            ]
        );

        $teams = Option::where('group', "TEM")->get();
        $people = Person::with('address')->get();
        return view('rumo.support', compact('course', 'teams', 'people'));
    }
}
