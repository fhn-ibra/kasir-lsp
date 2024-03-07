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
        return redirect()->route('produk')->with(['tambah' => true, 'message' => 'Data Berhasil ditambah']);
    }

    public function delete(Request $request){
        $produk = Produk::where('ProdukID', $request->id);
        $produk->delete();
        return redirect()->route('produk')->with(['delete' => true, 'message' => 'Data Berhasil dihapus']);
    }

    public function edit(Request $request){
        // dd($request->all());
        $produk = Produk::where('ProdukID', $request->id);
        $produk->update([
            'NamaProduk' => $request->produk,
            'Harga' => $request->harga,
            'Stok' => $request->stok
        ]);
        return redirect()->route('produk')->with(['edit' => true, 'message' => 'Data Berhasil diedit']);
    }
}
