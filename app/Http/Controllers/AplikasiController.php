<?php

namespace App\Http\Controllers;

use App\Services\Supports\AplikasiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AplikasiController extends Controller
{
    public function index(){
        $apps = AplikasiService::all()->get();

        return view('aplikasi.index', compact('apps'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'parent_id'=>$request->parent_id,
                'name'=>$request->name,
            ];
            $store = AplikasiService::store($data);
            DB::commit();
            return redirect()->route('aplikasi.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }
}
