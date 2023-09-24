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
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function index(Request $request)
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
            });
        return view('organization.index', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'organizations',
            'groups' => Group::all(),
            'types' => Type::all(),
            'organizations' => $organizations->paginate(15)
        ]);
    }

    public function create()
    {
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
            'villages' => Village::all(),
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd('penambahan data berhasil', request()->all());

        $validatedData = $request->validate([
            'code' => 'required|unique:organizations|max:4',
            'name' => 'required|max:255',
            'group_id' => 'required',
            'type_id' => 'required',
            'class' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'created_by' => 'required',
        ]);

        $validatedData['created_by'] = auth()->user()->id;


        Organization::create($validatedData);

        return redirect()->route('organization.all')->with('create-success', 'Data berhasil ditambahkan');
    }

    public function find($id)
    {
        return view('organization.find', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'detail-organizations',
            'organizations' => Organization::with(['group', 'type', 'province', 'regency', 'district', 'village', 'user'])->find($id)
        ]);
    }

    public function edit($id)
    {
        return view('organization.edit', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'edit-organizations',
            'groups' => Group::all(),
            'types' => Type::all(),
            'provinces' => Province::all(),
            'regencies' => Regency::all(),
            'districts' => District::all(),
            'villages' => Village::all(),
            'organizations' => Organization::with(['group', 'type', 'province', 'regency', 'district', 'village', 'user'])->find($id)
        ]);
    }

    public function update(Request $request, Organization $organization)
    {
        // dd('penambahan data berhasil', request()->all());

        $rule = $request->validate([
            'code' => 'required|max:4',
            'name' => 'required|max:255',
            'group_id' => 'required',
            'type_id' => 'required',
            'class' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
        ]);

        $rule['created_by'] = auth()->user()->id;

        Organization::where('id', $organization->id)
                    ->update($rule);

        return redirect()->route('organization.find')->with('edit-success', 'Data berhasil diperbarui');
    }

    public function destroy(Request $request)
    {
        // dd('penambahan data berhasil', $request->all());

        Organization::destroy($request->id);

        return redirect()->route('organization.all')->with('delete-success', 'Data berhasil dihapus');
    }

}
