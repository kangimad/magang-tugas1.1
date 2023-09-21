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
        // Route::patch('/edit/{id}', 'edit')->name('organization.edit');
        // Route::delete('/delete/{id}', 'edit')->name('organization.destroy');
    })
    ->controller(GroupController::class)->prefix('admin/group')->group(function () {
        Route::get('/', 'index')->name('group.all');
        // Route::post('/', 'store')->name('group.store');
        // Route::get('/create', 'index')->name('group.create');
        // Route::patch('/edit/{id}', 'edit')->name('group.edit');
        // Route::delete('/delete/{id}', 'edit')->name('group.destroy');
    })
    ->controller(TypeController::class)->prefix('admin/type')->group(function () {
        Route::get('/', 'index')->name('type.all');
        // Route::post('/', 'store')->name('type.store');
        // Route::get('/create', 'index')->name('type.create');
        // Route::patch('/edit/{id}', 'edit')->name('type.edit');
        // Route::delete('/delete/{id}', 'edit')->name('type.destroy');
    });

require __DIR__ . '/auth.php';
