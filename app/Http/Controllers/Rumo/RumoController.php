<?php

namespace App\Http\Controllers\Rumo;

use App\Http\Controllers\Admin\CrudController;
use App\Http\Requests\Admin\RumoRequest;
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
        $this->options['communities'] = Option::where('group', "CMN")->get();
        $this->options['types'] = Option::where('group', "GNR")->get();
        $this->viewName = 'rumo';
        $this->routeIndex = 'rumo.index';
        $this->validatorName = RumoRequest::class;
        $this->listGrid = Course::with(['leaders', 'teams'])->get();
    }

    public function index()
    {
        $communities = Option::where('group', "CMN")->get();
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

        $communities = Option::where('group', "CMN")->get();
        
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
        $communities = Option::where('group', "CMN")->get();
        $types = Option::where('group', "GND")->get();
        return view('rumo.new', compact('communities', 'types'));
    }
}
