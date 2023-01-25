<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PersonRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RecordRequest;
use App\Models\Option;
use App\Models\Person;
//use App\Models\Person;
use App\Models\Record;

/**
 * It's a CRUD feature to records of a person
 */
class RecordController extends CrudController
{
    public function __construct()
    {
        $this->className = Record::class;
        //$this->options['people'] = Person::all();
        $this->options['genders'] = Option::where('group', "GND")->get();
        $this->options['ufs'] = Option::where('group', "UFS")->get();
        $this->viewName = 'record';
        $this->routeIndex = 'records.index';
        $this->validatorName = RecordRequest::class;
        $this->listGrid = Record::with(
            ['person', 'presenter', 'person.community']
        )->where('is_approved', '0')->get();
        $this->title = 'Ficha';
    }

    public function storeCandidate(Request $request) {
        $data = $this->validate($request, (new PersonRequest)->rules());
        $person = Person::saveOrUpdate($data);
        $options['genders'] = $this->options['genders'];
        $options['ufs'] = $this->options['ufs'];
        return view('record.presenter', compact('person', 'options'));
    }

    public function storePresenter(Request $request) {
        $person_id = $request->input('person_id');
        if (empty($request->input('first_name'))) {
            return view('record.religion', compact('person_id'));
        }
        $data = $this->validate($request, (new PersonRequest)->rules());
        $presenter = Person::saveOrUpdate($data);
        return view('record.religion', compact('presenter', 'person_id'));
    }    

    public function store(Request $request)
    {
        $data = $this->validate($request, (new RecordRequest)->rules());
        Record::create($data);
        return redirect()->route('records.done');
    }

    public function done()
    {
        return view('record.done');
    }

    public function update(Request $request, $id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        $model->update(['is_approved'=>1]);
        return redirect()->route($this->routeIndex);
    }
}
