<?php

namespace App\Http\Controllers\Rumo;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Option;
use App\Models\Person;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function __construct()
    {
    }

    public function create($id)
    {
        $course = Course::find($id);
        $teams = Option::where('group', "TEM")->get();
        $people = Person::with('address')->get();
        return view('rumo.kitchen', compact('course', 'teams', 'people'));
    }

    public function store(Request $request)
    {
        if (! $course = Course::find($request->input("course_id"))) {
            return redirect()->back()->with('message', 'Curso não encontrado. Tente novamente');
        }

        $validated = $request->validate(
            [
                'photo' => 'file|required|mimes:jpg,png|max:1024',
            ]
        );

        if (! $validated) {
            return redirect()->back()->with('message', 'Essa foto não é válida. Tente novamente');
        }
/*
        XXX::create(
            [
                "course_id" => $course->id,
                "photo" => $path,
            ]
        );
*/
        $communities = Option::where('group', "CMN")->get();
        return view('rumo.index', compact('communities'));
    }
}
