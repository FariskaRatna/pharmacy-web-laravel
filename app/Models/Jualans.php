<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Jualans extends Model
{
    use HasFactory;
    protected $table = 'jualans';
    protected $fillable = [
        'nota',
        'status',
        'tanggal',
        'qty',
        'pajak',
        'subtotal',
        'consumer',
        'diskon',
        'item',
    ];

    public static function join()
    {
        return $data = DB::table('jualans')
            ->join('obats', 'obats.id', '=', 'jualans.item')
            ->join('pasiens', 'pasiens.id', '=', 'jualans.consumer')
            ->join('stock_obats', 'stock_obats.idObat', '=', 'obats.id')
            ->select('jualans.*', 
            'obats.nama_obat as nama_obat', 
            'stock_obats.jual', 
            'pasiens.nama_pasien as customer');
    }

    // public static function joinPasien()
    // {
    //     return $data = DB::table('jualans')
    //         ->join('pasiens', 'pasiens.id', 'jualans.consumer')
    //         ->select('jualans.*', 'pasiens.nama_pasien as namaPasien')
    //         ->get();
    // }
}
