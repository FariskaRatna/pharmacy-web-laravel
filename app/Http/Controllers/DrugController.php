<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Type;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $drugs = Drug::latest()->paginate(5);

        return view('drugs.index',compact('drugs'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $types = Type::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('drugs.create', compact('types','categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_obat' => 'required',
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'tanggal_masuk' => 'required',
            'kategori_resep' => 'required',
            'stok_masuk' => 'required',
            'pemasok' => 'required',
            'kadaluwarsa' => 'required'
        ]);

        // Drug::create($request->all());

        $drug = new Drug;
        $drug->id_obat = $request->id_obat;
        $drug->nama_obat = $request->nama_obat;
        $drug->jenis_obat = $request->jenis_obat;
        $drug->tanggal_masuk = $request->tanggal_masuk;
        $drug->kategori_resep = $request->kategori_resep;
        $drug->stok_masuk = $request->stok_masuk;
        $drug->pemasok = $request->pemasok;
        $drug->kadaluwarsa = $request->kadaluwarsa;
        $drug->save();

        return redirect()->route('drugs.index')
                        ->with('berhasil', 'obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Drug $drug): View
    {
        return view('drugs.show',compact('drug'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drug $drug): View
    {
        $types = Type::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('drugs.edit',compact('drug', 'types', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drug $drug):RedirectResponse
    {
        $request->validate([
            'id_obat' => 'required',
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'tanggal_masuk' => 'required',
            'kategori_resep' => 'required',
            'stok_masuk' => 'required',
            'pemasok' => 'required',
            'kadaluwarsa' => 'required'
        ]);

        $drug->update($request->all());

        return redirect()->route('drugs.index')
                        ->with('berhasil', 'Obat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drug $drug): RedirectResponse
    {
        $drug->delete();

        return redirect()->route('drugs.index')
                        ->with('berhasil', 'Obat berhasil di');
    }
}
