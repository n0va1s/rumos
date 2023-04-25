<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RumoController extends Controller
{
    public function index()
    {
        return view('admin.rumo');
    }
}
