<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obats';
    protected $fillable = [
        'id_obat',
        'nama_obat',
        'efek_samping',
        'dosis',
        'kategori',
        'kategori_obat',
        'satuan',
        'ready'
    ];

    public static function join() 
    {
        $data = DB::table('obats')
            ->join('types', 'obats.kategori', 'types.id')
            ->join('categories', 'obats.kategori_obat', 'categories.id')
            ->join('satuans', 'obats.satuan', 'satuans.id')
            ->select('obats.*', 'satuans.satuan as satuans', 'categories.kategori_obat as categories', 'types.kategori as types')
            ->get();
            return $data;
    }

    public static function joinStock()
    {
        $data = DB::table('stock_obats')
            ->join('obats', 'obats.id', 'stock_obats.idObat')
            ->select('stock_obats.*', 'obats.nama_obat as namaObat', 'obats.id as idObat')
            ->get();
        return $data;
    }

    public static function joinBuy()
    {
        $data = DB::table('belis')
            ->join('obats', 'obats.id', 'belis.barang')
            ->select('belis.*', 'obats.id_obat as kodeObat')
            ->get();
        return $data;
    }
}
