<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    // memproteksi nama tabel yang digunakan
    protected $table = "product_menus";

    // memproteksi field yang dapat diisi
    protected $fillable = [
        'nama_menu',
        'kategori',
        'harga',
        'stok',
        'gambar_menu',
    ];

    // accessor untuk format harga dalam rupiah
    public function getHargaRupiahAttribute(): string
    {
        return 'Rp ' . number_format((int) $this->harga, 0, ',', '.');
    }
}
