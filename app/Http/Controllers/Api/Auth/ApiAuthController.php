<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            "email" => "required|email",
            "password" => "required",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Gagal mendaftarkan user",
                'data' => $validator->errors(),
            ], 400);
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => "Gagal login user",
                'data' => $validator->errors(),
            ], 400);
        }

        $user = User::where('email', $request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil login user',
            'token'=> $user->createToken('api-user')->plainTextToken,
        ], 200);
    }
}
