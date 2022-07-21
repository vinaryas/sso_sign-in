<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Supports\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(){
        $users  = userService::all()->get();

        return response()->json([
            'data' => $users
        ], 200);
    }

    public function detail($nik){
        $users = UserService::find($nik)->first();
        if($users){
            return response()->json([
                'data' => $users
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
            'username'       => 'required',
            'email'   => 'required',
            'role_id'     => 'required',
            'password'       => 'required',
        ]);

        if($validasi->fails()){
            return response()->json( $validasi->errors() );
        }else{
            $post   = new User();
            $post->name    = $request->name;
            $post->username      = $request->username;
            $post->email  = $request->email;
            $post->role_id    = $request->role_id;
            $post->password      = $request->password;
            if($post->save()){
                return response()->json( 'Post Berhasil Disimpan');
            }else{
                return response()->json('Post Gagal Disimpan');
            }
        }
    }

    public function update($username, Request $request){
        $validasi = Validator::make($request->all(), [
            'name'     => 'required',
            'email'   => 'required',
            'role_id'     => 'required',
            'password'       => 'required',
        ]);

        if($validasi->fails()){
            return response()->json( $validasi->errors() );
        }else{
            $post           = userService::find($username);
            $post->name    = $request->name;
            $post->email  = $request->email;
            $post->role_id    = $request->role_id;
            $post->password      = $request->password;
            if($post->save()){
                return response()->json( 'Post Berhasil Diupdate');
            }else{
                return response()->json('Post Gagal Diupdate');
            }
        }
    }

    public function destroy($username){
        $post = UserService::findOrFail($username);

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
