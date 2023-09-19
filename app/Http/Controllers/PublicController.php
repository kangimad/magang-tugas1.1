<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Group;
use App\Models\Organization;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index ()
    {
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
        return view('public.index', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'organizations',
            'groups' => Group::all(),
            'types' => Type::all(),
            'organizations' => $organizations->paginate(15)
        ]);
    }
}
