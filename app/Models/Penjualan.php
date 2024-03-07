<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'TanggalPenjualan',
        'TotalHarga',
        'PelangganID',
    ];

    protected $primaryKey = 'PenjualanID';

    public $timestamps = false; 


    public function pelanggan(){
        $this->belongsTo(Pelanggan::class, 'PelangganID', 'PelangganID');
    }

    public function detailpenjualan(){
        $this->hasMany(DetailPenjualan::class, 'PenjualanID', 'PenjualanID');
    }
}
