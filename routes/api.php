<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\ApiOrganizationController;
use App\Http\Controllers\Api\Auth\ApiRegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    return response()->json([
        'status' => false,
        'message'=> 'Akses ditolak'
    ]);
})->name('login');

Route::apiResources([
    'register' => ApiRegisterController::class,
    'login' => ApiAuthController::class,
]);

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::apiResources([
//         'organizations' => ApiOrganizationController::class,
//     ]);
// });

Route::apiResources([
    'organizations' => ApiOrganizationController::class,
]);
