<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_transaction extends Model
{
    use HasFactory;

    protected $table = 'Detail Transaksi';
    // public $timestamps = true;

    // protected $casts = [
    //     'cost' => 'float'
    // ];

    protected $fillable = [
        'id_detail',
        'no_transaksi',
        'kode_produk',
        'qty',
        'harga',
        'sub_total'
    ];

}
