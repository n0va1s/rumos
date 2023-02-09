<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Option;

class GroupController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->className = Group::class;
        $this->options['communities'] = Option::where('group', "SEC")->get();
        $this->options['frequencies'] = Option::where('group', "FRQ")->get();
        $this->viewName = 'group';
        $this->routeIndex = 'groups.index';
        $this->validatorName = GroupRequest::class;
        $this->listGrid = Group::with(['community', 'frequency'])->get();
        $this->title = 'Reunião de grupo';
    }*/

    public function index()
    {
        return view('livewire.group',
        [
            'groups'=> Group::paginate(10),
            'communities' => Option::where('group', "SEC")->get(),
            'frequencies' => Option::where('group', "FRQ")->get()
        ]);
    }
}
