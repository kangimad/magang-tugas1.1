<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('type.index', [
            'app' => 'Health Services',
            'title' => 'types',
            'page' => 'types',
            'types' => Type::orderBy('name', 'asc')->get(),
        ]);
    }

    public function create()
    {
        return view('type.create', [
            'app' => 'Health Services',
            'title' => 'types',
            'subtitle' => 'Form',
            'page' => 'form-types',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rules = ['name' => 'required|max:255|unique:types'];

        $validated = $request->validate($rules);

        Type::create($validated);

        return redirect()->route('type.all')->with('create-success', 'Type baru berhasil ditambahkan');
    }

    public function find($id, Type $type)
    {
        return view('type.find', [
            'app' => 'Health Services',
            'title' => 'types',
            'subtitle' => 'Find',
            'page' => 'find-types',
            'types' => $type->find($id),
        ]);
    }

    public function edit($id,Type $type)
    {
        return view('type.edit', [
            'app' => 'Health Services',
            'title' => 'types',
            'page' => 'Edit',
            'page' => 'edit-types',
            'types' => $type->find($id),
        ]);
    }

    public function update(Request $request, type $type, $id)
    {
        // dd($request->all());

        if ($request->name !== $type->name) {
            $rules = ['name' => 'required|max:255|unique:types'];
        } else {
            $rules = ['name' => 'required|max:255'];
        }

        $validated = $request->validate($rules);

        Type::where('id', $id)->update($validated);

        return redirect()->route('type.find', [$id])->with('edit-success', 'Type berhasil diperbarui');
    }

    public function destroy($id, type $type)
    {
        Type::destroy($id);

        return redirect()->route('type.all')->with('delete-success', 'Type berhasil dihapus');
    }
}
