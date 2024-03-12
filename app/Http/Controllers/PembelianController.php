<?php

namespace App\Http\Controllers;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index(){
        return view('petugas.pembelian.index', [
            'data' => Pelanggan::all(),
            'title' => 'Pembelian'
        ]);
    }

    public function save(Request $request){
        // dd($request->all());
        
        $pelanggan = new Pelanggan();
        $pelanggan->namaPelanggan = $request->nama;
        $pelanggan->Alamat = $request->alamat;
        $pelanggan->NomorTelepon = $request->no;
        $pelanggan->save();
        
        $pelangganID = Pelanggan::where('Alamat', $request->alamat)->value('PelangganID');

        $penjualan = new Penjualan();
        $penjualan->TanggalPenjualan = Carbon::now()->format('Y-m-d');
        $penjualan->TotalHarga = null;
        $penjualan->PelangganID = $pelangganID;
        $penjualan->save();

        return redirect()->route('pembelian')->with(['tambah' => true, 'message' => 'Data Berhasil ditambah']);
    }

    public function delete(Request $request){
        dd($request->all());
    }

    public function edit(Request $request){
        $pelanggan = Pelanggan::where('PelangganID', $request->id);
        $pelanggan->update([
            'NamaPelanggan' => $request->nama,
            'Alamat' => $request->alamat,
            'NomorTelepon' => $request->no,
        ]);
        return redirect()->route('pembelian')->with(['edit' => true, 'message' => 'Data Berhasil diedit']);
    }
}
