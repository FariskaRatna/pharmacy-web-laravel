<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index() 
    {
        $data = Pengaduan::all();
        // return response()->json($data);
        if (request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('action', function ($data)
            {
                $button = ' <button class="edit btn btn-warning" id="'.$data->id.'" name="edit">Edit</button>';
                $button .= ' <button class="hapus btn btn-danger" id="'.$data->id.'" name="hapus">Hapus</button>';
                // $button .= ' <button class="show btn" id="'.$data->id.'" name="show">Show</button>';
                // $button = '<button class="show btn btn-danger id="'.$data->id.'" name="show">Show</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('layouts.dataKeluhan');
    }

    public function store(Request $request)
    {
        $simpan = Pengaduan::create($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil disimpan'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal disimpan'], 400);
        }

    }

    public function edits(Request $request)
    {
        $data = Pengaduan::find($request->id);
        return response()->json($data);
    }

    public function show(Request $request)
    {
        $data = Pengaduan::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        $data = Pengaduan::find($request->id);
        $simpan = $data->update($request->all());

        if ($simpan) {
            return response()->json(['text'=>'Data berhasil disimpan'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal disimpan'], 400);
        }

        return response()->json($data);
    }

    public function hapus(Request $request) 
    {
        $data = Pengaduan::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil dihapus'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal dihapus'], 400);
        }
    }

    // public function show()
    // {
    //     return view('layouts.tambahKeluhan');
    // }
   
}
