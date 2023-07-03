<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Jualans;
use App\Models\Pasien;
use App\Models\stockObat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JualansController extends Controller
{
    public function index(Request $request)
    {
        // $pelanggan = Pasien::select('id', 'nama_pasien')->get();
        // $pasien = Jualans::joinPasien();
        // $dataPasien = Pasien::join();
        $obat = Obat::joinStock();
        $tanggals = Carbon::now()->format('Y-m-d');
        $mytime = Carbon::now();
        $tanggal = $mytime->year . $mytime->month;
        $hitung = Jualans::count();
        if ($hitung == 0) {
            $urut = 10000001;
            $nomer = 'NT' . $tanggal . $urut;
        } else {
            $ambil = Jualans::all()->last();
            $urut = (int)substr($ambil->nota, -8) + 1;
            if ((int)substr($ambil->nota, -8) == 99999999) {
                $urut = 10000001;
            }
            $nomer = 'NT' . $tanggal . $urut;
        }
        return view('layouts.jualanHome', compact('obat', 'tanggals', 'nomer'));
    }

    // public function getDataPasien(Request $request)
    // {
    //     $data = Jualans::where('consumer', $request->id)->first();
    //     return response()->json($data);
    
    // }

    public function store(Request $request)
    {
        $rules = [
            'nama_pasien' => 'required',
            'telp' => 'required',
            'obat' => 'required',
            'qty' => 'required',
            'alamat' => 'required',
        ];

        $text = [
            'nama_pasien.required' => 'Kolom nama tidak boleh kosong',
            'telp.required' => 'Kolom telp tidak boleh kosong',
            'obat.required' => 'Kolom obat tidak boleh kosong',
            'alamat.required' => 'Kolom alamat tidak boleh kosong',
            'qty.required' => 'Kolom qty tidak boleh kosong',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);

        if ($validasi->fails()) {
            return response()->json(['success' => 0, 'text' => $validasi->errors()->first()], 422);
        }
        $pasien = [
            'nama_pasien' => $request->nama_pasien,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'resep' => $request->resep,
            'pengirim' => $request->pengirim,
        ];
        $consumer = Pasien::create($pasien);
        $idPasien = $consumer->id;
        $jualan = [
            'nota' => $request->nota,
            'tanggal' => $request->tanggal,
            'qty' => $request->qty,
            'subtotal' => $request->total,
            'consumer' => $idPasien,
            'diskon' => $request->diskon,
            'item' => $request->obat,
        ];

        $transaksi = Jualans::create($jualan);
        if ($transaksi) {
            $stock = stockObat::where('idObat', $request->obat)->first();
            $stock->update(['stock' => $request->stock]);
            return response()->json(['text' => 'Pembelian Ditambahkan'], 200);
        } else {
            return response()->json(['text' => 'Gagal Menambahkan'], 422);
        }
    }

    // public function dataTable(Request $request) 
    // {
    //     // $nota = $request->id;
    //     $data = Jualans::join();
    //         // ->where('jualans.nota', $nota)
    //         // ->latest();
    //     if (request()->ajax()) {
    //         return datatables()->of($data)
    //             ->addColumn('action', function ($data) {
    //                 $button = '<button class="hapus btn btn-danger" id="' . $data->id .'" name="hapus">Hapus</button>';
    //                 return $button;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    //     return view('layouts.transaksiHome');

    // }

    public function tampilkan()
    {
        // $nota = $request->id;
        $data = Jualans::join();
            // ->where('jualans.nota', $nota)
            // ->latest();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button class="hapus btn btn-danger" id="' . $data->id .'" name="hapus">Hapus</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.transaksiHome');

    }

    public function hapus(Request $request) 
    {
        $data = Jualans::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil dihapus'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal dihapus'], 400);
        }
    }

}
