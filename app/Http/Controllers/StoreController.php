<?php

namespace App\Http\Controllers;

use App\Services\Supports\RegionService;
use App\Services\Supports\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index(){
        $regions = RegionService::all()->get();
        $stores = StoreService::all()->get();

        return view('store.index', compact('stores', 'regions'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'id'=>$request->id,
                'name'=>$request->name,
                'region_id'=>$request->region_id,
                'email'=>$request->email,
            ];
            $store = StoreService::store($data);
            DB::commit();
            return redirect()->route('store.index');
        }catch(\Throwable $th){
            dd($th);
        }

    }
}
