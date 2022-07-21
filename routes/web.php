<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('adminlte::auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
Route::post('/role', [App\Http\Controllers\RoleController::class ,'store'])->name('role.store');

Route::get('/region', [App\Http\Controllers\RegionController::class, 'index'])->name('region.index');
Route::post('/region', [App\Http\Controllers\RegionController::class, 'store'])->name('region.store');

Route::get('/permission', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
Route::post('/permission', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');

Route::get('/permission_role', [App\Http\Controllers\PermissionRoleController::class, 'index'])->name('permission_role.index');
Route::post('/permission_role', [App\Http\Controllers\PermissionRoleController::class, 'store'])->name('permission_role.store');

Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store.index');
Route::post('/store', [App\Http\Controllers\StoreController::class, 'store'])->name('store.store');

Route::get('/role_user', [App\Http\Controllers\RoleUserController::class, 'index'])->name('role_user.index');
Route::post('/role_user', [App\Http\Controllers\RoleUserController::class, 'store'])->name('role_user.store');

Route::get('/aplikasi', [App\Http\Controllers\AplikasiController::class, 'index'])->name('aplikasi.index');
Route::post('/aplikasi', [App\Http\Controllers\AplikasiController::class, 'store'])->name('aplikasi.store');

Route::get('/user_store', [App\Http\Controllers\UserStoreController::class, 'index'])->name('user_store.index');
Route::post('/user_store', [App\Http\Controllers\UserStoreController::class, 'store'])->name('user_store.store');

