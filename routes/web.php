<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RoleControlle;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionCotroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('cms.parent');
// });

Route::prefix('admin/cms')->middleware('guest:web')->group(function(){
    Route::get('login',[UserAuthController::class,'showLogin'])->name('login');
    Route::post('login',[UserAuthController::class,'login']);
    Route::get('logout',[UserAuthController::class,'logout'])->name('logout');
});

Route::prefix("admin/cms")->group(function(){
    Route::view('/','cms.temp');
    // Route::post('delete', [SpecialityController::class, 'destroy']);
    Route::resource('specialities', SpecialityController::class);
    Route::resource('professions', ProfessionController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('users',UserController::class);
    Route::resource('users.permissions',UserPermissionCotroller::class);
    Route::resource('roles.permissions',RolePermissionController::class);
});

