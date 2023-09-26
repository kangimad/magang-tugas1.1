<?php

use App\Models\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganizationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->prefix('admin')->name('dashboard');

Route::middleware('auth')
    ->controller(ProfileController::class)->prefix('admin/profile')->group(function () {
        Route::get('/', 'edit')->name('profile.edit');
        Route::patch('/', 'update')->name('profile.update');
        Route::delete('/', 'destroy')->name('profile.destroy');
    })
    ->controller(OrganizationController::class)->prefix('admin/organization')->group(function () {
        Route::get('/', 'index')->name('organization.all');
        Route::post('/', 'store')->name('organization.store');
        Route::get('/create', 'create')->name('organization.create');
        Route::get('/{id}/find', 'find')->name('organization.find');
        Route::get('/{id}/edit', 'edit')->name('organization.edit');
        Route::put('/{id}/update', 'update')->name('organization.update');
        Route::delete('/{id}/delete', 'destroy')->name('organization.destroy');
    })
    ->controller(GroupController::class)->prefix('admin/group')->group(function () {
        Route::get('/', 'index')->name('group.all');
        Route::post('/', 'store')->name('group.store');
        Route::get('/create', 'create')->name('group.create');
        Route::get('/{id}/find', 'find')->name('group.find');
        Route::get('/{id}/edit', 'edit')->name('group.edit');
        Route::put('/{id}/update', 'update')->name('group.update');
        Route::delete('/{id}/delete', 'destroy')->name('group.destroy');
    })
    ->controller(TypeController::class)->prefix('admin/type')->group(function () {
        Route::get('/', 'index')->name('type.all');
        Route::post('/', 'store')->name('type.store');
        Route::get('/create', 'create')->name('type.create');
        Route::get('/{id}/find', 'find')->name('type.find');
        Route::get('/{id}/edit', 'edit')->name('type.edit');
        Route::put('/{id}/update', 'update')->name('type.update');
        Route::delete('/{id}/delete', 'destroy')->name('type.destroy');
    });

require __DIR__ . '/auth.php';
