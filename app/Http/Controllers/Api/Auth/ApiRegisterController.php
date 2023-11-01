<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiRegisterController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "username" => "required|unique:users,username",
            "email" => "required|email|unique:users,email",
            "password" => "required",
        ];

        $data = [
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Gagal mendaftarkan user",
                'data' => $validator->errors(),
            ], 400);
        }

        User::create($data);

        return response()->json([
            'status' => true,
            'message' => "Berhasil mendaftarkan user",
            'data' => $data,
        ], 200);
    }

}
