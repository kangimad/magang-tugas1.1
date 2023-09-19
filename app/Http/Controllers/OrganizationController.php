<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Type;
use App\Models\Group;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class OrganizationController extends Controller
{
    public function index () {
        $organizations = Organization::query()
            ->with(['groups', 'types', 'provinces', 'regencies', 'districts', 'villages'])
            // ->when($request->name, function ($query) use ($request) {
            //     return $query->where('name', 'like', '%' . $request->name . '%');
            // })
            // ->when($request->group_id, function ($query) use ($request) {
            //     return $query->where('group_id', 'like', '%' . $request->group_id . '%');
            // })
            // ->when($request->type_id, function ($query) use ($request) {
            //     return $query->where('type_id', 'like', '%' . $request->type_id . '%');
            // })
            ;
        return view('organization.index', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'organizations',
            'groups' => Group::all(),
            'types' => Type::all(),
            'organizations' => $organizations->paginate(15)
        ]);
    }

    public function create () {
        return view('organization.create', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'form-organization',
            'subtitle' => 'Form',
            'groups' => Group::all(),
            'types' => Type::all(),
            'provinces' => Province::all(),
            'regencies' => Regency::all(),
            'districts' => District::all(),
            'villages' => Village::all()
        ]);
    }
}
