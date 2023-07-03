<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::all();
        // return response()->json($data);
        if (request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('action', function ($data)
            {
                $button = ' <button class="edit btn btn-warning" id="'.$data->id.'" name="edit">Edit</button>';
                $button .= ' <button class="hapus btn btn-danger" id="'.$data->id.'" name="hapus">Hapus</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('layouts.pasienHome');

        // $categories = Category::latest()->paginate(5);

        // return view('categories.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(): View
    // {
    //     return view('categories.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $simpan = Pasien::create($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil disimpan'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal disimpan'], 400);
        }

        // $request->validate([
        //     'kategori_obat' => 'required'
        // ]);

        // Category::create($request->all());

        // return redirect()->route('categories.index')->with('berhasil', 'kategori obat berhasil ditambahkan');
    }

    public function edits(Request $request)
    {
        $data = Pasien::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        $data = Pasien::find($request->id);
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
        $data = Pasien::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil dihapus'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal dihapus'], 400);
        }
    }

    // public function getDataPasien(Request $request)
    // {
         
    //     $data = Pasien::where('consumer', $request->id)->first();
    //     return response()->json($data);
    
    // }

}
