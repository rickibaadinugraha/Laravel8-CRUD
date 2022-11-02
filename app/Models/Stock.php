<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'Stock';
    protected $fillable = [
        'id',
        'kode_produk',
        'stock_aktual',
    ];

    public function produk()
    {
        return $this->hasMany(Project::class, 'kode_produk', 'kode_produk');
    }

}
