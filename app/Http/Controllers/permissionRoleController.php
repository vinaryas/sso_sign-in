<?php

namespace App\Http\Controllers;

use App\Services\Supports\AplikasiService;
use App\Services\Supports\PermissionRoleService;
use App\Services\Supports\PermissionService;
use App\Services\Supports\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class permissionRoleController extends Controller
{
    public function index(){
        $permissionRoles = PermissionRoleService::all()->get();
        $permissions = PermissionService::all()->get();
        $roles = RoleService::all()->get();
        $apps = AplikasiService::all()->get();

        return view('permission_role.index', compact('permissionRoles', 'permissions', 'roles', 'apps'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'aplikasi_id'=>$request->aplikasi_id,
                'permission_id'=>$request->permission_id,
                'role_id'=>$request->role_id,
            ];
            $store = PermissionRoleService::store($data);
            DB::commit();
            return redirect()->route('permission_role.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }
}
