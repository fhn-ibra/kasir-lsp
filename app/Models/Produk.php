<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'produk';

    protected $fillable = [
        'NamaProduk',
        'Harga',
        'Stok',
    ];

    protected $primaryKey = 'ProdukID';

    function detailpenjualan(){
        return $this->hasMany(DetailPenjualan::class, 'ProdukID', 'ProdukID');
    }
}
