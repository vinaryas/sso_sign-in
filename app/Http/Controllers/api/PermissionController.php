<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Services\Supports\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index(){
        $permissions  = PermissionService::all()->get();

        return response()->json([
            'data' => $permissions
        ], 200);
    }

    public function detail($aplikasi_id){
        $permissions = PermissionService::find($aplikasi_id)->get();
        if($permissions){
            return response()->json([
                'data' => $permissions
            ], 200);
        }else{
            return response()->json([
                'tidak ada data'
            ]);
        }
    }

    public function store(Request $request){
        $validasi = Validator::make($request->all(), [
            'parent_id'=>'required',
            'name'=>'required',
            'display_name'=>'required',
            'description'=>'required',
        ]);

        if($validasi->fails()){
            return response()->json( $validasi->errors() );
        }else{
            $post   = new Permission();
            $post->parent_id    = $request->parent_id;
            $post->name      = $request->name;
            $post->display_name  = $request->display_name;
            $post->description    = $request->description;
            if($post->save()){
                return response()->json( 'Post Berhasil Disimpan');
            }else{
                return response()->json('Post Gagal Disimpan');
            }
        }
    }

    public function destroy($id){
        $post = PermissionService::findOrFail($id);

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
