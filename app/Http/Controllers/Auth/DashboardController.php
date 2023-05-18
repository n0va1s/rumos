<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Option;
use App\Models\Person;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['total_courses'] = Course::count();
        $data['total_communities'] = Option::where('group', 'SEC')->count();
        $data['total_groups'] = Group::count();
        $course = Course::with('community')->latest()->first();
        $quantityByGender = DB::table('person')
        ->selectRaw('count(person.id) as qtd, gender_id, title')
        ->join('options', 'options.id', '=', 'person.gender_id')
        ->groupBy('gender_id')
        ->having('gender_id', '>', 0)
        ->get();
        return view('dashboard', compact('data', 'course', 'quantityByGender'));
    }
}