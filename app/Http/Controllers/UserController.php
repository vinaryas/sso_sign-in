<?php

namespace App\Http\Controllers;

use App\Services\Supports\RegionService;
use App\Services\Supports\RoleService;
use App\Services\Supports\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = UserService::all()->get();
        $roles = RoleService::all()->get();
        $regions = RegionService::all()->get();


        return view('User.index', compact('users', 'roles', 'regions'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'nik'=>$request->nik,
                'name'=>$request->name,
                'email'=>$request->email,
                'region_id'=>$request->region_id,
                'password' => Hash::make($request->password),
                'password2' => Hash::make($request->password),
            ];
            $store = UserService::store($data);
            DB::commit();
            return redirect()->route('user.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }
}
