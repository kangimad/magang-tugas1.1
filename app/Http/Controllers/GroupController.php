<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('group.index', [
            'app' => 'Health Services',
            'title' => 'Groups',
            'page' => 'groups',
            'groups' => Group::orderBy('name', 'asc')->get(),
        ]);
    }

    public function create()
    {
        return view('group.create', [
            'app' => 'Health Services',
            'title' => 'Groups',
            'subtitle' => 'Form',
            'page' => 'form-groups',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rules = ['name' => 'required|max:255|unique:groups'];

        $validated = $request->validate($rules);

        Group::create($validated);

        return redirect()->route('group.all')->with('create-success', 'Group baru berhasil ditambahkan');
    }

    public function find($id, Group $group)
    {
        return view('group.find', [
            'app' => 'Health Services',
            'title' => 'Groups',
            'subtitle' => 'Find',
            'page' => 'find-groups',
            'groups' => $group->find($id),
        ]);
    }

    public function edit($id, Group $group)
    {
        return view('group.edit', [
            'app' => 'Health Services',
            'title' => 'Groups',
            'page' => 'Edit',
            'page' => 'edit-groups',
            'groups' => $group->find($id),
        ]);
    }

    public function update(Request $request,Group $group, $id)
    {
        // dd($request->all());

        if ($request->name !== $group->name) {
            $rules = ['name' => 'required|max:255|unique:groups'];
        }else{
            $rules = ['name' => 'required|max:255'];
        }

        $validated = $request->validate($rules);

        Group::where('id', $id)->update($validated);

        return redirect()->route('group.find', [$id])->with('edit-success', 'Group berhasil diperbarui');
    }

    public function destroy($id, Group $group)
    {
        Group::destroy($id);

        return redirect()->route('group.all')->with('delete-success', 'Group berhasil dihapus');
    }
}
