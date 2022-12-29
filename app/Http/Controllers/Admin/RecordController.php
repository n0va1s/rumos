<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\RecordRequest;
use App\Models\Person;
use App\Models\Record;
/**
 * It's a CRUD feature to records of a person
 */
class RecordController extends CrudController
{
    public function __construct()
    {
        $this->className = Record::class;
        $this->options['people'] = Person::all();
        $this->viewName = 'record';
        $this->routeIndex = 'records.index';
        $this->validatorName = RecordRequest::class;
        $this->listGrid = Record::with(
            ['person', 'presenter', 'person.community']
        )->where('is_approved', '0')->get();
    }

    public function store(Request $req)
    {
        if (isset($this->validatorName)) {
            $data = $this->validate($req, (new $this->validatorName)->rules());
        }
        $this->className::create($data);
        return redirect()->route('records.create');
    }

    public function update(Request $req, $id)
    {
        if (! $model = $this->className::find($id)) {
            return redirect()->back();
        }
        $model->update(['is_approved'=>1]);
        return redirect()->route($this->routeIndex);
    }
}
