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
        $this->title = 'Pessoa';
    }

    public function clearFormat(string $input)
    {
        $find = array("(", ")", "-", ".", " ", "/");
        $replace = array("", "", "", "", "", "");
        return str_replace($find, $replace, $input);

    }

    public function store(Request $req)
    {
        $data = $this->validate($req, (new $this->validatorName)->rules());
        $id = Person::create(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $this->clearFormat($data['phone']),
                'social' => $data['social'],
                'birth_at' => $data['birth_at'],
                'gender_id' => $data['gender_id']
            ]
        )->id;
        if (isset($id) && !empty($data['zipcode'])) {
            Address::create(
                [
                    'person_id' => $id,
                    'description' => $data['description'],
                    'number' => $data['number'],
                    'city' => $data>['city'],
                    'zipcode' => $this->clearFormat($data['zipcode']),
                    'state_id' => $data['uf_id'],
                ]
            );
        }
        return redirect()->route($this->routeIndex);
    }

    public function update(Request $req, $id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        $data = $this->validate($req, (new $this->validatorName)->rules());
        $model->first_name = $data['first_name'];
        $model->last_name = $data['last_name'];
        $model->email = $data['email'];
        $model->phone = $this->clearFormat($data['phone']);
        $model->social = $data['social'];
        $model->birth_at = $data['birth_at'];
        $model->gender_id = $data['gender_id'];
        $model->address->description = $data['description'];
        $model->address->number = $data['number'];
        $model->address->city = $data['city'];
        $model->address->zipcode = $this->clearFormat($data['zipcode']);
        $model->address->state_id = $data['uf_id'];
        //Don't save related models
        //$model->save();
        $model->push();       
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
