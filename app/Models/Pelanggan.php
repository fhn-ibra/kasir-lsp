<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = [
        'NamaPelanggan',
        'Alamat',
        'NomorTelepon',
    ];

    protected $primaryKey = 'PelangganID';

    public $timestamps = false; 


    public function penjualan(){
        $this->hasMany(Penjualan::class, 'PelangganID', 'PelangganID');
    }

}
