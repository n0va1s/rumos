<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PersonRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RecordRequest;
use App\Models\Option;
use App\Models\Person;
use App\Models\Record;

class RecordController extends Controller
{
    protected $genders;
    protected $ufs;

    public function __construct()
    {
        $this->genders = Option::where('group', 'GND')->get();
        $this->ufs = Option::where('group', 'UFS')->get();
    }

    public function index()
    {
        return view('admin.record');
    }

    public function create()
    {

        return view('public.record-member')
            ->with('genders', $this->genders)
            ->with('ufs', $this->ufs);
    }

    public function storeCandidate(Request $request)
    {
        $data = $this->validate($request, (new PersonRequest)->rules());
        $person = Person::saveOrUpdate($data);

        return view('public.record-presenter')
            ->with('genders', $this->genders)
            ->with('ufs', $this->ufs)
            ->with('person', $person);
    }

    public function storePresenter(Request $request)
    {
        $person_id = $request->input('person_id');
        if (empty($request->input('first_name'))) {
            return view('public.record-religion', compact('person_id'));
        }
        $data = $this->validate($request, (new PersonRequest)->rules());
        $presenter = Person::saveOrUpdate($data);
        return view('public.record-religion', compact('presenter', 'person_id'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, (new RecordRequest)->rules());
        Record::create($data);
        return view('public.record-done');
    }
}
