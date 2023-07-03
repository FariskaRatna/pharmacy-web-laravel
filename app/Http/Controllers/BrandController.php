<?php

namespace App\Http\Controllers;

use App\Models\Brand;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Http\Response;
// use Illuminate\View\View;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brand::all();
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

        return view('layouts.supplierHome');

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

       $simpan = Brand::create($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil disimpan'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal disimpan'], 422);
        }

        // return redirect()->route('brand.index')->with('berhasil', 'supplier berhasil ditambahkan');
    }

    public function edits(Request $request)
    {
        $data = Brand::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        $data = Brand::find($request->id);
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
        $data = Brand::find($request->id);
        $simpan = $data->delete($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil dihapus'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal dihapus'], 400);
        }
    }
    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Brand $brand)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Brand $brand): View
    // {
    //     return view('brands.edit', compact('brand'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Brand $brand): RedirectResponse
    // {
    //     $request->validate([
    //         'nama_supplier' =>  'required',
    //         'email' => 'required',
    //         'alamat' => 'required'
    //     ]);

    //     $brand->update($request->all());

    //     return redirect()->route('brands.index')->with('berhasil', 'supplier berhasil diperbarui');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Brand $brand)
    // {
    //     $brand->delete();

    //     return redirect()->route('brands.index')->with('berhasil', 'supplier berhasil dihapus');
    // }
}
