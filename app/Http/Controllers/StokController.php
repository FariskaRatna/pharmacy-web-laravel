<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index()
    {
        $obat = Obat::where('ready', 'N')->get();
        $stok = Stok::join()
            ->get();

        if (request()->ajax()) {
            return datatables()->of($stok) 
                ->addColumn('action', function ($stok) {
                    $button = ' <button class="edit btn btn-warning" id="'.$data->id.'" name="edit">Edit</button>';
                    $button .= ' <button class="hapus btn btn-danger" id="'.$data->id.'" name="hapus">Hapus</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.stokObat', compact('obat'));
    }

    public function store(Request $request) 
    {
        dd($request->all());
        // $data = new Obat();
        // $data->id_obat = $request->nama_obat;
        // $data->stok_masuk = $request->stok_masuk;
        // $data->stok_keluar = $request->stok_keluar;
        // $data->beli = $request->stok;
        // $data->jual = $request->jual;
        // $data->stok = $request->beli;
        // $data->tanggal_masuk = $request->tanggal_masuk;
        // $data->kadaluwarsa = $request->kadaluwarsa;
        // $data->keterangan = $request->keterangan;
        
        // $simpan = $data->save();
        // if ($simpan) {
        //     DB::table('obats')->where('id', $request->obat)->update(['ready' => 'Y']);
        //     return response()->json(['text'=>'Data berhasil disimpan'], 200);
        // } 
        // else {
        //     return response()->json(['text'=>'Data gagal disimpan'], 400);
        // }
    }

    public function getObat(Request $request) 
    {
        $data = Obat::where('id_obat', $request->id)->first();
        $null = [
            'stok' => 0
        ];
        if ($data != null) {
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['data' => $null]);
        }
    }
}
