<?php

namespace App\Http\Controllers;

use App\Services\Supports\AplikasiService;
use App\Services\Supports\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = RoleService::all()->get();
        $apps = AplikasiService::all()->get();

        return view('role.index', compact('roles', 'apps'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'aplikasi_id'=>$request->aplikasi_id,
                'name'=>$request->name,
                'display_name'=>$request->display_name,
                'description'=>$request->description,
            ];
            $store = RoleService::store($data);
            DB::commit();
            return redirect()->route('role.index');
        }catch(\Throwable $th){
            dd($th);
        }

    }
}
