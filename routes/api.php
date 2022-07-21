<?php

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

Route::get('/user', [Api\UserController::class, 'index']);
Route::post('/user/store', [Api\UserController::class, 'store']);
Route::get('/user/{id}', [Api\UserController::class, 'detail']);
Route::post('/user/update/{id}', [Api\UserController::class, 'update']);
Route::delete('/user/destroy/{id}', [Api\UserController::class, 'destroy']);

Route::get('/permission', [Api\PermissionController::class, 'index']);
Route::post('/permission/store', [Api\PermissionController::class, 'store']);
Route::get('/permission/{id}', [Api\PermissionController::class, 'detail']);
Route::post('/permission/update/{id}', [Api\PermissionController::class, 'update']);
Route::delete('/permission/destroy/{id}', [Api\PermissionController::class, 'destroy']);

Route::get('/role', [Api\RoleController::class, 'index']);
Route::post('/role/store', [Api\RoleController::class, 'store']);
Route::get('/role/{id}', [Api\RoleController::class, 'detail']);
Route::post('/role/update/{id}', [Api\RoleController::class, 'update']);
Route::delete('/role/destroy/{id}', [Api\RoleController::class, 'destroy']);

Route::get('/region', [Api\RegionController::class, 'index']);
Route::post('/region/store', [Api\RegionController::class, 'store']);
Route::get('/region/{id}', [Api\RegionController::class, 'detail']);
Route::post('/region/update/{id}', [Api\RegionController::class, 'update']);
Route::delete('/region/destroy/{id}', [Api\RegionController::class, 'destroy']);

Route::get('/store', [Api\StoreController::class, 'index']);
Route::post('/store/store', [Api\StoreController::class, 'store']);
Route::get('/store/{id}', [Api\StoreController::class, 'detail']);
Route::post('/store/update/{id}', [Api\StoreController::class, 'update']);
Route::delete('/store/destroy/{id}', [Api\StoreController::class, 'destroy']);

Route::get('/permission_role', [Api\PermissionRoleController::class, 'index']);
Route::post('/permission_role/store', [Api\PermissionRoleController::class, 'store']);
Route::get('/permission_role/{permission_id}', [Api\PermissionRoleController::class, 'detail']);
Route::post('/permission_role/update/{id}', [Api\PermissionRoleController::class, 'update']);
Route::delete('/permission_role/destroy/{id}', [Api\PermissionRoleController::class, 'destroy']);

Route::get('/role_user', [Api\RoleUserController::class, 'index']);
Route::post('/role_user/store', [Api\RoleUserController::class, 'store']);
Route::get('/role_user/{id}', [Api\RoleUserController::class, 'detail']);
Route::post('/role_user/update/{id}', [Api\RoleUserController::class, 'update']);
Route::delete('/role_user/destroy/{id}', [Api\RoleUserController::class, 'destroy']);

Route::get('/aplikasi', [Api\AplikasiController::class, 'index']);
Route::post('/aplikasi/store', [Api\AplikasiController::class, 'store']);
Route::get('/aplikasi/{id}', [Api\AplikasiController::class, 'detail']);
Route::post('/aplikasi/update/{id}', [Api\AplikasiController::class, 'update']);
Route::delete('/aplikasi/destroy/{id}', [Api\AplikasiController::class, 'destroy']);

Route::get('/user_store', [Api\UserStoreController::class, 'index']);
Route::post('/user_store/store', [Api\UserStoreController::class, 'store']);
Route::get('/user_store/{id}', [Api\UserStoreController::class, 'detail']);
Route::post('/user_store/update/{id}', [Api\UserStoreController::class, 'update']);
Route::delete('/user_store/destroy/{id}', [Api\UserStoreController::class, 'destroy']);

