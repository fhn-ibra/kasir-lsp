<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualan';

    protected $fillable = [
        'PenjualanID',
        'ProdukID',
        'JumlahProduk',
        'Subtotal',
    ];

    protected $primaryKey = 'DetailID';

    public $timestamps = false; 


    public function penjualan(){
       return $this->belongsTo(Penjualan::class, 'PenjualanID', 'PenjualanID');
    }

    public function produk(){
        return $this->belongsTo(Produk::class, 'ProdukID', 'ProdukID');
     }
}
