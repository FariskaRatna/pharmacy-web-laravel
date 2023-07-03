<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Beli extends Model
{
    use HasFactory;
    protected $fillable = [
        'faktur',
        'subtotal',
        'harga',
        'qty',
        'tanggal',
        'totalKotor',
        'pajak',
        'diskon',
        'totalBersih',
        'keterangan',
        'supplier'
    ];

    public static function join()
    {
        $data = DB::table('belis')
            ->join('brands', 'brands.id', '=', 'belis.supplier')
            ->join('obats', 'obats.id', '=', 'belis.barang')
            ->join('stock_obats', 'stock_obats.idObat', '=', 'obats.id')
            ->select('belis.*', 'brands.nama_supplier as namaSup', 'obats.nama_obat as nama_obat', 'stock_obats.beli');
    }

}
