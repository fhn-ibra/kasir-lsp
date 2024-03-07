<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        return view('admin.produk', [
            'data' => Produk::all(),
            'title' => 'Produk'
        ]);
    }

    public function save(Request $request){
        $produk = new Produk();
        $produk->NamaProduk = $request->produk;
        $produk->Harga = $request->harga;
        $produk->Stok = $request->stok;
        $produk->save();
        return redirect()->route('produk')->with(['tambah' => true]);
    }
}
