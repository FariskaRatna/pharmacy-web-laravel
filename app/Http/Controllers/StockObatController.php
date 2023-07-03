<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\stockObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockObatController extends Controller
{
    public function index() 
    {
        $obat = Obat::where('ready', 'N')->get();
        $stock = stockObat::join()
            ->get();
        if (request()->ajax()) {
            return datatables()->of($stock)
                ->addColumn('action', function ($stock) {
                    $button = '<button class="edit btn btn-warning" id="' . $stock->id .'" name="edit">Edit</button>';
                    $button .= '<button class="hapus btn btn-danger" id="' . $stock->id .'" name="hapus">Hapus</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.stockObat', compact('obat'));
    }

    public function store(Request $request) 
    {
//         "obat" => "1"
//   "stockLama" => "0"
//   "id" => null
//   "masuk" => "10"
//   "keluar" => "0"
//   "stock" => "10"
//   "beli" => "1"
//   "jual" => "2"
//   "tanggal_masuk" => "2023/04/25"
//   "kadaluwarsa" => "2025/07/16"
//   "keterangan" => "Faktur Pembelian Nomor 1"


        $data = new stockObat();
        $data->idObat = $request->obat;
        $data->masuk = $request->masuk;
        $data->keluar = $request->keluar;
        $data->beli = $request->beli;
        $data->jual = $request->jual;
        $data->stock = $request->stock;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->kadaluwarsa = $request->kadaluwarsa;
        $data->keterangan = $request->keterangan;
        
        $simpan = $data->save();
        if ($simpan) {
            DB::table('obats')->where('id', $request->obat)->update(['ready' => 'Y']);
            return response()->json(['text'=>'Data berhasil disimpan'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal disimpan'], 400);
        }
        // dd($request->all());
    }

    public function getObat(Request $request)
    {
        $data = stockObat::where('idObat', $request->id)->first();
        $null = [
            'stock' => 0
        ];
        if ($data != null) {
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['data' => $null]);
        }
    }

    public function edits(Request $request)
    {
        $id = $request->id;
        $data = stockObat::join()
            ->where('stock_obats.id', $id)
            ->first();
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        // "obat" => "3"
        // "stockLama" => "110"
        // "id" => "3"
        // "masuk" => "15"
        // "keluar" => "0"
        // "stock" => "125"
        // "beli" => "1500.00"
        // "jual" => "3000.00"
        // "tanggal_masuk" => "2023-04-07"
        // "kadaluwarsa" => "2025-12-12"
        // "keterangan" => "Faktur Pembelian tidak ada"

        $datas = [
            'idObat' => $request->obat,
            'masuk' => $request->masuk,
            'keluar' => $request->keluar,
            'jual' => $request->jual,
            'beli' => $request->beli,
            'stock' => $request->stock,
            'tanggal_masuk' => $request->tanggal_masuk,
            'kadaluwarsa' => $request->kadaluwarsa,
            'keterangan' => $request->keterangan,
        ];

        $data = stockObat::find($request->id);
        $simpan = $data->update($datas);
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil disimpan'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal disimapn'], 400);
        }
    }
    

    // public function hapus(Request $request) 
    // {
    //     $data = stockObata::find($request->id);
    //     $simpan = $data->delete();
    //     if ($simpan) {
    //         return response()->json(['text'=>'Data berhasil dihapus'], 200);
    //     } 
    //     else {
    //         return response()->json(['text'=>'Data gagal dihapus'], 400);
    //     }
    // }

    public function getDataObat(Request $request)
    {
         
        $data = stockObat::where('idObat', $request->id)->first();
        return response()->json($data);
    
    }

    public function dataObat(Request $request)
    {
        $data = stockObat::where('idObat', $request->id)->first();
        return response()->json($data);
    }


    private function data(array $data)
    {
        $data = [
            'idObat' => $data['obat'],
            'masuk' => $data['masuk'],
            'keluar' => $data['keluar'],
            'jual' => $data['jual'],
            'beli' => $data['beli'],
            'stock' => $data['stock'],
            'tanggal_masuk' => $data['tanggal_masuk'],
            'kadaluwarsa' => $data['kadaluwarsa'],
            'keterangan' => $data['keterangan'],
        ];
        return $data;
    }
}
