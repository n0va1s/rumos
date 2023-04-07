<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;

class RumoController extends Controller
{
    public function index()
    {
        return view('admin.rumo');
    }
}
