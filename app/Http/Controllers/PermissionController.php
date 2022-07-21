<?php

namespace App\Http\Controllers;

use App\Services\Supports\AplikasiService;
use App\Services\Supports\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index(){
        $permissions = PermissionService::all()->get();
        $apps = AplikasiService::all()->get();

        return view('permission.index', compact('permissions', 'apps'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'parent_id'=>$request->parent_id,
                'aplikasi_id'=>$request->aplikasi_id,
                'name'=>$request->name,
                'display_name'=>$request->display_name,
                'description'=>$request->description,
            ];
            $store = PermissionService::store($data);
            DB::commit();
            return redirect()->route('permission.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }
}
