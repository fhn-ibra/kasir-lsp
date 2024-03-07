<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detailpenjualan';

    protected $fillable = [
        'PenjualanID',
        'ProdukID',
        'JumlahProduk',
        'Subtotal',
    ];

    protected $primaryKey = 'DetailID';

    public $timestamps = false; 


    public function penjualan(){
        $this->belongsTo(Penjualan::class, 'PenjualanID', 'PenjualanID');
    }
}
