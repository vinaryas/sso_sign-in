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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::post('/role', [RoleController::class ,'store'])->name('role.store');

Route::get('/region', [RegionController::class, 'index'])->name('region.index');
Route::post('/region', [RegionController::class, 'store'])->name('region.store');

Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');

Route::get('/permission_role', [PermissionRoleController::class, 'index'])->name('permission_role.index');
Route::post('/permission_role', [PermissionRoleController::class, 'store'])->name('permission_role.store');

Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::post('/store', [StoreController::class, 'store'])->name('store.store');

Route::get('/role_user', [RoleUserController::class, 'index'])->name('role_user.index');
Route::post('/role_user', [RoleUserController::class, 'store'])->name('role_user.store');

Route::get('/aplikasi', [AplikasiController::class, 'index'])->name('aplikasi.index');
Route::post('/aplikasi', [AplikasiController::class, 'store'])->name('aplikasi.store');

Route::get('/user_store', [userStoreController::class, 'index'])->name('user_store.index');
Route::post('/user_store', [userStoreController::class, 'store'])->name('user_store.store');

