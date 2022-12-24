<?php

namespace App\Http\Controllers\Rumo;

use App\Http\Controllers\Admin\CrudController;
use App\Http\Requests\Rumo\CourseRequest;
use App\Models\Course;
use App\Models\Option;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RumoController extends CrudController
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->className = Course::class;
        $this->options['communities'] = Option::where('group', "SEC")->get();
        $this->options['types'] = Option::where('group', "GNR")->get();
        $this->viewName = 'rumo';
        $this->routeIndex = 'rumos.index';
        $this->validatorName = CourseRequest::class;
        $this->listGrid = Course::with(['leaders', 'teams'])->get();
    }

    public function index()
    {
        $communities = Option::where('group', "SEC")->get();
        return view('rumo.index', compact('communities'));
    }

    public function search(Request $request)
    {
        $community_id = (int) $request->input('community_id');
        
        if (! $community = Option::find($community_id)) {
            return redirect()->back()->with('message', 'Secretariado não encontrado. Tente novamente');
        }
        
        $courses = Course::whereHas(
            'community', 
            function (Builder $query) use ($community) {
                $query->where('id', '=', $community->id);
            }
        )->get();

        $communities = Option::where('group', "SEC")->get();
        
        return view(
            'rumo.index', 
            compact(
                'communities', 
                'community_id', 
                'courses'
            )
        );
    }

    public function create()
    {
        $communities = Option::where('group', "SEC")->get();
        $types = Option::where('group', "GND")->get();
        return view('rumo.new', compact('communities', 'types'));
    }

    public function show($id)
    {
        $course = Course::with(['leaders', 'teams', 'type', 'community'])->find($id);
        return view('rumo.show', compact('course'));
    }

    public function destroy($id)
    {
        if (! $model = $course = Course::find($id)) {
            return redirect()->back();
        }
        if (! empty($model->leaders)) {
            foreach ($model->leaders as $leader) {
                $leader->delete();
            }
        }
        if (! empty($model->teams)) {
            foreach ($model->teams as $team) {
                $team->delete();
            }
        }
        if (! empty($model->photo)) {
            $model->photo->delete();
        }
        $model->delete();
        $communities = Option::where('group', "SEC")->get();
        return view('rumo.index', compact('communities'));
    }
}
