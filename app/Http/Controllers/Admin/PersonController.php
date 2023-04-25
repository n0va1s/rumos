<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    public function index() 
    {
        return view('admin.person');
    }   
}
