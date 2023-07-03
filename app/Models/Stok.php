<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'stoks';
    protected $fillable = [
        'id_obat',
        'stok_masuk',
        'stok_keluar',
        'beli',
        'jual',
        'stok',
        'tanggal_masuk',
        'kadaluwarsa',
        'keterangan',
    ];

    public static function join() {
        $data = DB::table('stoks')
            ->join('obats', 'stoks.id_obat', 'obats.id')
            ->select('stoks.*', 'obats.nama_obat as namaObat');
            return $data;
    }
}
