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
        $this->middleware(['auth','verified']);
        $this->className = Person::class;
        $this->options['genders'] = Option::where('group', "GND")->get();
        $this->options['ufs'] = Option::where('group', "UFS")->get();
        $this->viewName = 'person';
        $this->routeIndex = 'people.index';
        $this->validatorName = PersonRequest::class;
        $this->listGrid = Person::with(['gender', 'address'])->get();
    }

    public function store(Request $req)
    {
        $data = $this->validate($req, (new $this->validatorName)->rules());
        $data['person_id'] = $this->className::create($data)->id;
        Address::create([
            'person_id'=>$data['person_id'],
            'description'=>$data['description'],
            'number'=>$data['number'],
            'city'=>$data['city'],
            'zipcode'=>$data['zipcode'],
            'state_id'=>$data['uf_id'],
        ]);
        return redirect()->route($this->routeIndex);
    }

    public function update(Request $req, $id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        $data = $this->validate($req, (new $this->validatorName)->rules());
        $model->address->description = $data['description'];
        $model->address->number = $data['number'];
        $model->address->city = $data['city'];
        $model->address->zipcode = $data['zipcode'];
        $model->address->state_id = $data['uf_id'];
        $model->push();       
        return redirect()->route($this->routeIndex);
    }

    public function destroy($id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        $model->address->delete();
        $model->delete();
        return redirect()->route($this->routeIndex);
    }
}
