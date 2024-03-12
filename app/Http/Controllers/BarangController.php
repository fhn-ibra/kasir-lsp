<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index($id){
        $pelanggan = Pelanggan::where('PelangganID', $id)->first();
        $penjualan = Penjualan::where('PelangganID', $id)->value('PenjualanID');
        $datapenjualan = Penjualan::where('PelangganID', $id)->first();
        $detailpenjualan = DetailPenjualan::where('PenjualanID', $penjualan)->get();
        $barang = Produk::all();
        // dd($detailpenjualan);
        return view('petugas.pembelian.barang',[
            'title' => 'Update Pembelian',
            'pelanggan' => $pelanggan,
            'penjualan' => $datapenjualan,
            'barang' => $barang,
            'detailPenjualan' => $detailpenjualan
        ]);
    }

    public function save(Request $request){
        $stokProduk = Produk::where('ProdukID', $request->id)->value('Stok');

        if($request->jumlah > $stokProduk){
            return back()->with(['error' => true, 'message' => 'Maaf, Stok tidak Mencukupi']);
        }

        $hargaProduk = (int) Produk::where('ProdukID', $request->id)->value('Harga');
        $jumlahBeli = (int) $request->jumlah;
        $total = $hargaProduk * $jumlahBeli;

        $penjualanTotalHarga = Penjualan::where('PenjualanID', $request->PenjualanID)->first();
        $penjualanTotalHarga->TotalHarga += $total;
        $penjualanTotalHarga->save();

        $detailPenjualan = new DetailPenjualan();
        $detailPenjualan->PenjualanID = $request->PenjualanID;
        $detailPenjualan->ProdukID = $request->id;
        $detailPenjualan->JumlahProduk = $request->jumlah;
        $detailPenjualan->Subtotal = $total;
        $detailPenjualan->save();

        $produk = Produk::where('ProdukID', $request->id)->first();
        $produk->Stok -= $request->jumlah;
        $produk->save();

        return back()->with(['tambah' => true, 'message' => 'Data Berhasil ditambah']);
    }
}
