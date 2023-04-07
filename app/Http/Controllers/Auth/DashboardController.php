<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $male = DB::table('options')->where('group', 'GND')->first();
        $data['total_courses'] = DB::table('courses')->get()->count();
        $data['total_communities'] = DB::table('options')->where('group', 'SEC')->count();
        $data['total_groups'] = DB::table('groups')->get()->count();
        $data['total_men'] = DB::table('person')->where('gender_id', $male->id)->count();
        $data['total_women'] = DB::table('person')->where('gender_id', $male->id + 1)->count();
        $course = DB::table('courses')
            ->join('options', 'courses.community_id', '=', 'options.id')
            ->latest()
            ->first();
        $year = date('Y', strtotime($course->starts_at));
        return view('dashboard', compact('data', 'course', 'year'));
    }
}