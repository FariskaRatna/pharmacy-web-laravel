<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $table = 'drugs';
    protected $fillable = [
        'id_obat', 
        'nama_obat', 
        'jenis_obat',
        'tanggal_masuk',
        'bentuk_obat',
        'kategori_resep',
        'stok_masuk',
        'pemasok',
        'kadaluwarsa'
    ];
}
