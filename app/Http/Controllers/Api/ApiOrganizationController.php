<?php

namespace App\Http\Controllers\Api;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Organization::latest()->paginate(10);
        return response()->json([
            'status' => true,
            'message' => "Data berhasil diperoleh",
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
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
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Gagal menambahkan data",
                "data" => $validator->errors()
            ], 400);
        };

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
            'created_by' => $request->input('created_by')
        ];

        Organization::create($data);

        return response()->json([
            'status' => true,
            'message' => "Behasil menambahkan data",
            "data" => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Organization::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => "Data berhasil diperoleh",
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Data tidak ditemukan",
            ], 400);
        };
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Organization::find($id);

        if (empty($data)) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
            ], 404);
        };

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
            'village_id' => 'required',
            'created_by' => 'required',
        ];

        if($request->input('code') != $data->code){
            $rules['code'] = 'required|unique:organizations|max:4';
        }

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
            'created_by' => $request->input('created_by')
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Gagal menambahkan data",
                "data" => $validator->errors()
            ], 400);
        };

        Organization::where('id', $id)
            ->update($data);

        return response()->json([
            'status' => true,
            'message' => "Behasil memperbarui data",
            "data" => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Organization::find($id);

        if (empty($data)) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
            ], 404);
        };

        $data->delete();

        return response()->json([
            "status" => true,
            "message" => "Data berhasil dihapus",
        ], 200);
    }
}
