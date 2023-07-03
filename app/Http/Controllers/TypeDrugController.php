<?php

namespace App\Http\Controllers;

use App\Models\Type;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
// use Illuminate\View\View;

class TypeDrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Type::all();
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

        return view('layouts.typesHome');

        // $types = Type::latest()->paginate(5);

        // return view('types.index', compact('types'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create(): View
    // {
    //     return view('types.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {

        $simpan = Type::create($request->all());
        if ($simpan) {
            return response()->json(['text'=>'Data berhasil disimpan'], 200);
        } 
        else {
            return response()->json(['text'=>'Data gagal disimpan'], 400);
        }
        // $request->validate([
        //     'kategori' => 'required'
        // ]);

        // Type::create($request->all());

        // return redirect()->route('types.index')->with('berhasil', 'jenis obat berhasil ditambahkan');
    }

    public function edits(Request $request)
    {
        $data = Type::find($request->id);
        return response()->json($data);
    }

    public function updates(Request $request)
    {
        $data = Type::find($request->id);
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
        $data = Type::find($request->id);
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
    // public function show(Type $type)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Type $type): View
    // {
    //     return view('types.edit', compact('type'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Type $type):RedirectResponse
    // {
    //     $request->validate([
    //         'kategori' => 'required'
    //     ]);

    //     $type->update($request->all());
    //     return redirect()->route('types.index')->with('berhasil', 'jenis obat berhasil diperbarui');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Type $type): RedirectResponse
    // {
    //     $type->delete();

    //     return redirect()->route('types.index')->with('berhasil', 'jenis obat berhasil dihapus');
    // }
}
