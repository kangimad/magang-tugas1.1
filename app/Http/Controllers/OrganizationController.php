<?php

namespace App\Http\Controllers;

use App\Exports\OrganizationExport;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Type;
use App\Models\Group;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\FuncCall;

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
            })
            ->orderBy('name', 'asc')->paginate(15);

        return view('organization.index', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'organizations',
            'groups' => Group::all(),
            'types' => Type::all(),
            'organizations' => $organizations
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
        ]);
    }

    public function store(Request $request)
    {
        // dd('penambahan Organization berhasil', request()->all());

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

        return redirect()->route('organization.all')->with('create-success', 'Organization berhasil ditambahkan');
    }

    public function find(Request $request)
    {
        return view('organization.find', [
            'app' => 'Health Services',
            'title' => 'Organizations',
            'page' => 'detail-organizations',
            'organizations' => Organization::with(['group', 'type', 'province', 'regency', 'district', 'village', 'user'])->find($request->id)
        ]);
    }

    public function edit(Request $request, Organization $organization)
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
            'organizations' => $organization->with(['group', 'type', 'province', 'regency', 'district', 'village', 'user'])->find($request->id)
        ]);
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());

        $rules = [
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
        ];

        $data = $request->validate($rules);

        $data = [
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'group_id' => $request->input('group_id'),
            'type_id' => $request->input('type_id'),
            'class' => $request->input('class'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'province_id' => $request->input('province_id'),
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
            'village_id' => $request->input('village_id'),
            'created_by' => auth()->user()->id
        ];

        Organization::where('id', $id)
            ->update($data);

        return redirect()->route('organization.find', [$id])->with('edit-success', 'Organization berhasil diperbarui');
    }

    public function destroy(Request $request)
    {
        // dd('penambahan Organization berhasil', $request->all());

        Organization::destroy($request->id);

        return redirect()->route('organization.all')->with('delete-success', 'Organization berhasil dihapus');
    }
}
