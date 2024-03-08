<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->level == 'Admin' || Auth::user()->level == 'admin') {
            return view('petugas.user', [
                'data' => User::all(),
                'title' => 'User'
            ]);
        } else {
            return redirect()->route('produk');
        }
    }

    public function save(Request $request){
        $user = new User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->level = $request->level;
        $user->save();
        return redirect()->route('user')->with(['tambah' => true, 'message' => 'Akun Berhasil ditambah']);
    }
    
    public function delete(Request $request){
        $akun = User::where('id', $request->id);
        $akun->delete();
        return redirect()->route('user')->with(['delete' => true, 'message' => 'Akun Berhasil dihapus']);
    }

    public function edit(Request $request){
        // dd($request->all());
        $akun = User::find($request->id);
        if ($request->password == null){
            if($request->level != null){
                $akun->nama = $request->nama;
                $akun->username = $request->username;
                $akun->level = $request->level;
                $akun->save();
            } else {
                $akun->nama = $request->nama;
                $akun->username = $request->username;
                $akun->save();
            }
        } else {
            $akun->nama = $request->nama;
            $akun->username = $request->username;
            $akun->level = $request->level;
            $akun->password = $request->password;
            $akun->save();
        }
        return redirect()->route('user')->with(['edit' => true, 'message' => 'Akun Berhasil diedit']);
    }
}
