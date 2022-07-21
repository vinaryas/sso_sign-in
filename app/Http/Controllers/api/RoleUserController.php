<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Services\Supports\RoleUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleUserController extends Controller
{
    public function index(){
        $roleUsers  = RoleUserService::all()->get();

        return response()->json([
            'data' => $roleUsers
        ], 200);
    }

    public function detail($aplikasi_id){
        $roleUsers = RoleUserService::find($aplikasi_id)->get();
        if($roleUsers){
            return response()->json([
                'data' => $roleUsers
            ], 200);
        }else{
            return response()->json([
                'tidak ada data'
            ]);
        }
    }

    public function store(Request $request){
        $validasi = Validator::make($request->all(), [
            'role_id'=>'required',
            'user_id'=>'required',
            'user_type'=>'required',
        ]);

        if($validasi->fails()){
            return response()->json( $validasi->errors() );
        }else{
            $post   = new RoleUser();
            $post->role_id      = $request->role_id;
            $post->user_id    = $request->user_id;
            $post->user_type    = $request->user_type;
            if($post->save()){
                return response()->json( 'Post Berhasil Disimpan');
            }else{
                return response()->json('Post Gagal Disimpan');
            }
        }
    }

    public function destroy($id){
        $post = RoleUserService::findOrFail($id);

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
