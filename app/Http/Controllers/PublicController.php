<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Group;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index (Request $request)
    {
        $organizations = Organization::query()
            ->with(['group', 'type', 'province', 'regency', 'district', 'village'])
            ->when($request->name, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->name . '%');
            })
            ->when($request->group_id, function ($query) use ($request) {
                return $query->where('group_id', 'like', '%' . $request->group_id . '%');
            })
            ->when($request->type_id, function ($query) use ($request) {
                return $query->where('type_id', 'like', '%' . $request->type_id . '%');
            })
            ->orderBy('name', 'asc')->paginate(15);
        return view('public.index', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'organizations',
            'groups' => Group::all(),
            'types' => Type::all(),
            'organizations' => $organizations
        ]);
    }
}
