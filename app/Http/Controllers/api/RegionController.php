<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Services\Supports\RegionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    public function index(){
        $regions  = RegionService::all()->get();

        return response()->json([
            'data' => $regions
        ], 200);
    }

    public function detail($id){
        $regions = RegionService::find($id)->first();
        if($regions){
            return response()->json([
                'data' => $regions
            ], 200);
        }else{
            return response()->json([
                'tidak ada data'
            ]);
        }
    }

    public function store(Request $request){
        $validasi = Validator::make($request->all(), [
            'name'     => 'required',
        ]);

        if($validasi->fails()){
            return response()->json( $validasi->errors() );
        }else{
            $post   = new Region();
            $post->name    = $request->name;
            if($post->save()){
                return response()->json( 'Post Berhasil Disimpan');
            }else{
                return response()->json('Post Gagal Disimpan');
            }
        }
    }

    public function destroy($id){
        $post = RegionService::findOrFail($id);

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
