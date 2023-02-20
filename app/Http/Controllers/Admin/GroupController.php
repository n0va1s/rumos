<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        return view('group.index')
        ->with('groups', Group::paginate(10));
    }    
}
