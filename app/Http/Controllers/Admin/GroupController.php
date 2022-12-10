<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\GroupRequest;
use App\Models\Group;
use App\Models\Option;

class GroupController extends CrudController
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->className = Group::class;
        $this->options['communities'] = Option::where('group',"CMN")->get();
        $this->options['frequencies'] = Option::where('group',"FRQ")->get();
        $this->viewName = 'group';
        $this->routeIndex = 'groups.index';
        $this->validatorName = GroupRequest::class;
        $this->listGrid = Group::with(['community', 'frequency'])->get();
    }
}
