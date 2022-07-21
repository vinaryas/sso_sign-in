<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Services\Supports\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function index(){
        $permissions  = StoreService::all()->get();

        return response()->json([
            'data' => $permissions
        ], 200);
    }

    public function detail($id){
        $stores = StoreService::find($id)->first();
        if($stores){
            return response()->json([
                'data' => $stores
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
            $post   = new Store();
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
        $post = StoreService::findOrFail($id);

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
