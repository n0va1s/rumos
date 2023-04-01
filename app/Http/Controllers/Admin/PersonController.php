<?php

namespace App\Http\Controllers\Admin;

use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class PersonController extends CrudController
{
    public function index() 
    {
        return view('admin.person')
        ->with(
            'people', 
            Person::where(
                'community_id',
                Auth::user()->community_id
            )->paginate(10));
    }   
}
