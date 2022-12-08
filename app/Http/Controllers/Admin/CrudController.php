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
        return view($this->viewName.'.index', compact('data'));
        
    }

    public function create()
    {
        if (isset($this->types)) {
            $data = $this->types;
            return view($this->viewName.'.new', compact('data'));
        }
        return view($this->viewName.'.new');
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, (new $this->validatorName)->rules());
        $this->className::create($data);
        return redirect()->route($this->routeIndex);
    }

    public function edit(string $code)
    {
        $data = $this->className::where('code', $code)->first();
        if (is_null($data)) {
            return back();
        }
        if (isset($this->types)) {
            $types = $this->types::all();
            return view($this->viewName.'.edit', compact('data', 'types'));
        }
        return view($this->viewName.'.edit', compact('data'));        
    }

    public function update(Request $req, string $code)
    {
        $data = $req->except('_token');
        $this->validate($req, (new $this->validatorName)->rules());
        $this->className::where('code', $code)->first()->update($data);
        return redirect()->route($this->routeIndex);
    }

    public function destroy(string $code)
    {
        $qtd = $this->className::where('code', $code)->first()->delete();
        if ($qtd === 0) {
            return back();
        }
        return redirect()->route($this->routeIndex);
    }
}
