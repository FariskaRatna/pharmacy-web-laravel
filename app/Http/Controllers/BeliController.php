<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Beli;
use App\Models\Brand;
use Illuminate\Support\Carbon;


class BeliController extends Controller
{
    public function index() 
    {
        $supp = Brand::select('nama_supplier', 'id');
        $obats = Obat::joinStock();
        // $kode = Obat::select('id', 'id_obat')->get();
        $time = Carbon::now()->format('Y-m-d');
        $mytime = Carbon::now();
        $tanggal = $mytime->year . $mytime->month;
        $hitung = Beli::count();
        if ($hitung == 0) {
            $urut = 100001;
            $nomer = 'FKTR' . $tanggal .$urut;
        } else {
            $ambil = Beli::all()->last();
            $urut = (int)substr($ambil->faktur, -6) + 1;
            $nomer = 'FKTR' . $tanggal . $urut;
        }
        return view('layouts.pembelianHome', compact('time', 'nomer', 'supp', 'obats'));
    }
}
