<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $fillable = [
        'nama_pasien',
        // 'jenis_kelamin',
        // 'usia',
        'alamat',
        'telp',
        // 'alergi',
        'resep',
        'pengirim',
    ];

    // public static function join()
    // {
    //     $data = DB::table('jualans')
    //         ->join('pasiens', 'pasiens.id', 'jualans.consumer')
    //         ->select('jualans.*', 'pasiens.nama_pasien as namaPasien', 'pasiens.id as consumer')
    //         ->get();
    //     return $data;
    // }

}
