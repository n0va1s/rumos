<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class CrudController extends Controller
{
    
    protected $className, $validatorName, $viewName, $routeIndex, $types, $listGrid, 
    $paginateGrid;
    
    public function index()
    {
        //List by select query
        if (isset($this->listGrid)) {
            $data = $this->listGrid;
        }
        //List by eloquent classname::all()
        if (isset($this->paginateGrid)) {
            $data = $this->className::paginate($this->paginateGrid);    
        }
        if (isset($this->options)) {
            $options = $this->options;
            return view($this->viewName.'.index', compact('data','options'));
        }
        return view($this->viewName.'.index', compact('data'));
        
    }

    public function create()
    {
        if (isset($this->options)) {
            $options = $this->options;
            return view($this->viewName.'.new', compact('options'));
        }
        return view($this->viewName.'.new');
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, (new $this->validatorName)->rules());
        $this->className::create($data);
        return redirect()->route($this->routeIndex);
    }

    public function edit($id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        if (isset($this->options)) {
            $options = $this->options;
            return view($this->viewName.'.edit', compact('model', 'options'));
        }
        return view($this->viewName.'.edit');        
    }

    public function update(Request $req, $id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        $data = $this->validate($req, (new $this->validatorName)->rules());
        $model->update($data);
        return redirect()->route($this->routeIndex);
    }

    public function destroy($id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        $model->delete();
        return redirect()->route($this->routeIndex);
    }
}
