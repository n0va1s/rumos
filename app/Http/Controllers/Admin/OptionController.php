<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\OptionRequest;
use App\Models\Option;

class OptionController extends CrudController
{
    public function __construct()
    {
        $this->className = Option::class;
        $this->viewName = 'option';
        $this->routeIndex = 'options.index';
        $this->validatorName = OptionRequest::class;
        $this->listGrid = Option::all();
        $this->title = 'opção de configuração';
    }

}
