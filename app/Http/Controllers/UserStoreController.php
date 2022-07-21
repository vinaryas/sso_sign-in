<?php

namespace App\Http\Controllers;

use App\Services\Supports\StoreService;
use App\Services\Supports\UserService;
use App\Services\Supports\UserStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserStoreController extends Controller
{
    public function index(){
        $users = UserService::all()->get();
        $stores = StoreService::all()->get();
        $userStores = UserStoreService::all()->get();

        return view('UserStore.index', compact('users', 'stores', 'userStores'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'store_id'=>$request->store_id,
                'user_id'=>$request->user_id,
            ];

            $store = UserStoreService::store($data);
            DB::commit();
            return redirect()->route('user_store.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }


}
