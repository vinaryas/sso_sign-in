<?php

namespace App\Http\Controllers;

use App\Services\Supports\RegionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class RegionController extends Controller
{
    public function index(){
        $regions = RegionService::all()->get();

        return view('region.index', compact('regions'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'name'=>$request->name,
            ];
            $store = RegionService::store($data);
            DB::commit();
            return redirect()->route('region.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }

}
