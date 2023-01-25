<?php

namespace App\Http\Controllers\Rumo;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Option;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create($id)
    {
        $course = Course::find($id);
        return view('rumo.photo', compact('course'));
    }

    public function store(Request $request)
    {
        if (! $course = Course::find($request->input("course_id"))) {
            return redirect()->back()->with('error', 'Curso não encontrado. Tente novamente');
        }

        $validated = $request->validate(
            [
                'photo' => 'file|required|mimes:jpg,png|max:1024',
            ]
        );

        if (! $validated) {
            return redirect()->back()->with('error', 'Essa foto não é válida. Tente novamente');
        }

        $find = array("à", "á", "â", "ã", "é", "ê", "ì", "í", "ò", "ó", "ô", "õ", "ú", " ");
        $replace = array("a", "a", "a", "a", "e", "e", "i", "i", "o", "o", "o", "o", "u", "");
        $community = mb_strtolower(
            str_replace($find, $replace, $course->community->title)
        );
        
        $extension = $request->photo->extension();
        $path = $request->photo->storeAs(
            "public/cursos",
            "$community/$course->year-$course->number.$extension"
        );
        
        Photo::create(
            [
                "course_id" => $course->id,
                "url" => $path,
            ]
        );

        $communities = Option::where('group', "SEC")->get();
        return view('rumo.index', compact('communities'));
    }
}
