<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'Produk';
    protected $fillable = [
        'id',
        'kode_produk',
        'nama_produk',
        'harga_produk',
        'file_img_produk',
    ];

    public function stocks()
    {
        return $this->belongsTo(Stock::class, 'kode_produk', 'kode_produk');
    }
    public function detail_transactions()
    {
        return $this->belongsTo(Detail_transaction::class, 'harga_produk', 'harga');
    }
}
