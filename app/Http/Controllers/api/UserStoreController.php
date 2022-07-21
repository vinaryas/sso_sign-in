<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserStore;
use App\Services\Supports\UserStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserStoreController extends Controller
{
    public function index(){
        $permissionRoles  = UserStoreService::all()->get();

        return response()->json([
            'data' => $permissionRoles
        ], 200);
    }

    public function detail($id){
        $permissionRoles = UserStoreService::find($id)->first();
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
            $post   = new UserStore();
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
        $post = UserStoreService::findOrFail($id);

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
