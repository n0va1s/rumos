<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PersonRequest;
use App\Models\Address;
use App\Models\Option;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends CrudController
{
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
        $this->className = Person::class;
        $this->options['genders'] = Option::where('group', "GND")->get();
        $this->options['ufs'] = Option::where('group', "UFS")->get();
        $this->viewName = 'person';
        $this->routeIndex = 'people.index';
        $this->validatorName = PersonRequest::class;
        $this->listGrid = Person::with(['gender', 'address'])->get();
        $this->title = 'Pessoa';
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, (new $this->validatorName)->rules());
        Person::saveOrUpdate($data);
        return redirect()->route($this->routeIndex);
    }

    /*Its a service for others person forms like records*/
    /*
    public function save(Request $req, string $forward)
    {
        $data = $this->validate($req, (new $this->validatorName)->rules());
        $person = Person::saveOrUpdate($data);
        $url = route($forward, ['id' => $person->id]);
        return redirect()->route($url);
    }
    */
    
    public function update(Request $req, $id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        $data = $this->validate($req, (new $this->validatorName)->rules());
        Person::saveOrUpdate($data);
        return redirect()->route($this->routeIndex);
    }

    public function destroy($id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        if (! empty($model->address)) {
            $model->address->delete();
        }
        $model->delete();
        return redirect()->route($this->routeIndex);
    }
}
