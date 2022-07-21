<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PermissionRole;
use App\Services\Supports\PermissionRoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionRoleController extends Controller
{
    public function index(){
        $permissionRoles  = PermissionRoleService::all()->get();

        return response()->json([
            'data' => $permissionRoles
        ], 200);
    }

    public function detail($aplikasi_id){
        $permissionRoles = PermissionRoleService::find($aplikasi_id)->get();
        if($permissionRoles){
            return response()->json([
                'data' => $permissionRoles
            ], 200);
        }else{
            return response()->json([
                'tidak ada data'
            ]);
        }
    }

    public function store(Request $request){
        $validasi = Validator::make($request->all(), [
            'permission_id'=>'required',
            'role_id'=>'required',
        ]);

        if($validasi->fails()){
            return response()->json( $validasi->errors() );
        }else{
            $post   = new PermissionRole();
            $post->permission_id    = $request->permission_id;
            $post->role_id      = $request->role_id;
            if($post->save()){
                return response()->json( 'Post Berhasil Disimpan');
            }else{
                return response()->json('Post Gagal Disimpan');
            }
        }
    }

    public function destroy($id){
        $post = PermissionRoleService::findOrFail($id);

        if($post->delete()){
            return response([
                'Berhasil Menghapus Data'
            ]);
        }else{
            return response([
                'Tidak Berhasil Menghapus Data'
            ]);
        }
    }
}
