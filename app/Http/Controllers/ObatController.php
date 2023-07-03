<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Category;
use App\Models\Satuan;
use App\Models\Type;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $satuan = Satuan::select('id', 'satuan')->get();
        $kategori_obat = Category::select('id', 'kategori_obat')->get();
        $kategori = Type::select('id', 'kategori')->get();

        $data = Obat::join();
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

        return view('layouts.obatHome', compact('satuan', 'kategori_obat', 'kategori'));

        // $brands = Brand::latest()->paginate(5);

        // return view('brands.index', compact('brands'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    // public function create(): View
    // {
    //     return view('brands.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {

        
        // $request->validate([
        //     'nama_supplier' => 'required',
        //     'email' => 'required',
        //     'alamat' => 'required'
        // ]);

        // $rules = [
        //     'nama_supplier'=> 'required',
        //     'email'=> 'required|unique:brands,email',
        //     'telp'=> 'required|min:12|unique:brands,telp',
        //     'rekening'=> 'requiredunique:brands,rekening',
        //     'alamat'=> 'required',
        // ];

        // $text = [
        //     'nama_supplier.required' => 'Kolom nama supplier tidak boleh kosong',
        //     'email.required' => 'Kolom email tidak boleh kosong',
        //     'email.unique' => 'Email telah terdaftar',
        //     'telp.required' => 'Kolom nomor telepon tidak boleh kosong',
        //     'telp.unique' => 'Nomor telepon telah terdaftar',
        //     'telp.min' => 'Inputan kurang dari 12 digit',
        //     'rekening.required' => 'Kolom nomor rekening tidak boleh kosong',
        //     'rekening.unique' => 'Nomor rekening telah terdaftar',
        //     'alamat.required' => 'Kolom alamat tidak boleh kosong',

        // ];

        // $validasi = Validator::make($request->all(), $rules, $text);
        
        // if ($validasi->fails()) {
        //     return response()->json(['success' => 0, 'text' => $validasi->errors()->first()], 422);
        // }

       $simpan = Obat::create($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil disimpan'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal disimpan'], 400);
        }

        // return redirect()->route('brand.index')->with('berhasil', 'supplier berhasil ditambahkan');
    }

    public function edits(Request $request)
    {
        $data = Obat::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        $data = Obat::find($request->id);
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
        $data = Obat::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil dihapus'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal dihapus'], 400);
        }
    }

    public function getKode(request $request) 
    {
        $kode = $request->id_obat;
        $data = Obat::where('id', $kode)->get();
        return response()->json($data, 200);
    }
}
