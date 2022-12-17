<?php

namespace App\Http\Controllers\Lever;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lever;
use App\Models\Option;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PrintLeverController extends Controller
{
    public function index()
    {
        $communities = Option::where('group', "CMN")->get();
        return view('lever.index', compact('communities'));
    }

    public function search(Request $request)
    {
        $community_id = (int) $request->input('community_id');
        $course_id = (string) $request->input('course_id');
        
        if (! $community = Option::find($community_id)) {
            return redirect()->back()->with('message', 'Secretariado não encontrado. Tente novamente');
        }
        
        $courses = Course::whereHas(
            'community', 
            function (Builder $query) use ($community) {
                $query->where('id', '=', $community->id);
            }
        )->get();

        $communities = Option::where('group', "CMN")->get();

        if (($community_id > 0) and (!emptY($course_id))) {
            $levers = Lever::with(
                'course', 'person'
            )->where(
                'course_id', $course_id
            )->get();

            if (! $levers->isEmpty()) {
                return redirect()->back()->with(
                    'message', 'Não há alavancas para o curso deste secretariado'
                );
            }

            return view(
                'lever.index', 
                compact(
                    'communities', 
                    'community_id', 
                    'courses', 
                    'course_id',
                    'levers'
                )
            );
        }

        return view(
            'lever.index', 
            compact(
                'communities', 
                'community_id', 
                'courses', 
                'course_id'
            )
        );
    }
}
