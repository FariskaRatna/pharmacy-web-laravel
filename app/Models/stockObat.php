<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class stockObat extends Model
{
    use HasFactory;
    protected $fillable = [
        'idObat',
        'masuk',
        'keluar',
        'jual',
        'beli',
        'stock',
        'tanggal_masuk',
        'kadaluwarsa',
        'keterangan',
    ];

    public static function join() {
        $data = DB::table('stock_obats')
            ->join('obats', 'obats.id', 'stock_obats.idObat')
            ->select('stock_obats.*', 'obats.nama_obat as namaObat');
        return $data;
    }

    public function store(Request $request) {
        dd($request->all());
    }
}
