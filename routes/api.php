<?php

use App\Http\Controllers\api\AplikasiController;
use App\Http\Controllers\api\PermissionRoleController;
use App\Http\Controllers\api\RegionController;
use App\Http\Controllers\api\RoleUserController;
use App\Http\Controllers\api\StoreController;
use App\Http\Controllers\api\UserStoreController;
use App\Http\Controllers\api\PermissionController;
use App\Http\Controllers\api\RoleController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'detail']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy']);

Route::get('/permission', [PermissionController::class, 'index']);
Route::post('/permission/store', [PermissionController::class, 'store']);
Route::get('/permission/{id}', [PermissionController::class, 'detail']);
Route::post('/permission/update/{id}', [PermissionController::class, 'update']);
Route::delete('/permission/destroy/{id}', [PermissionController::class, 'destroy']);

Route::get('/role', [RoleController::class, 'index']);
Route::post('/role/store', [RoleController::class, 'store']);
Route::get('/role/{id}', [RoleController::class, 'detail']);
Route::post('/role/update/{id}', [RoleController::class, 'update']);
Route::delete('/role/destroy/{id}', [RoleController::class, 'destroy']);

Route::get('/region', [RegionController::class, 'index']);
Route::post('/region/store', [RegionController::class, 'store']);
Route::get('/region/{id}', [RegionController::class, 'detail']);
Route::post('/region/update/{id}', [RegionController::class, 'update']);
Route::delete('/region/destroy/{id}', [RegionController::class, 'destroy']);

Route::get('/store', [StoreController::class, 'index']);
Route::post('/store/store', [StoreController::class, 'store']);
Route::get('/store/{id}', [StoreController::class, 'detail']);
Route::post('/store/update/{id}', [StoreController::class, 'update']);
Route::delete('/store/destroy/{id}', [StoreController::class, 'destroy']);

Route::get('/permission_role', [PermissionRoleController::class, 'index']);
Route::post('/permission_role/store', [PermissionRoleController::class, 'store']);
Route::get('/permission_role/{permission_id}', [PermissionRoleController::class, 'detail']);
Route::post('/permission_role/update/{id}', [PermissionRoleController::class, 'update']);
Route::delete('/permission_role/destroy/{id}', [PermissionRoleController::class, 'destroy']);

Route::get('/role_user', [RoleUserController::class, 'index']);
Route::post('/role_user/store', [RoleUserController::class, 'store']);
Route::get('/role_user/{id}', [RoleUserController::class, 'detail']);
Route::post('/role_user/update/{id}', [RoleUserController::class, 'update']);
Route::delete('/role_user/destroy/{id}', [RoleUserController::class, 'destroy']);

Route::get('/aplikasi', [AplikasiController::class, 'index']);
Route::post('/aplikasi/store', [AplikasiController::class, 'store']);
Route::get('/aplikasi/{id}', [AplikasiController::class, 'detail']);
Route::post('/aplikasi/update/{id}', [AplikasiController::class, 'update']);
Route::delete('/aplikasi/destroy/{id}', [AplikasiController::class, 'destroy']);

Route::get('/user_store', [UserStoreController::class, 'index']);
Route::post('/user_store/store', [UserStoreController::class, 'store']);
Route::get('/user_store/{id}', [UserStoreController::class, 'detail']);
Route::post('/user_store/update/{id}', [UserStoreController::class, 'update']);
Route::delete('/user_store/destroy/{id}', [UserStoreController::class, 'destroy']);

