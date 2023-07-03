@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Informasi Ketersediaan Obat</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('drugs.create') }}"> Buat Stok Baru</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>ID Obat</th>
        <th>Nama Obat</th>
        <th>Jenis Obat</th>
        <th>Tanggal Masuk</th>
        {{-- <th>Bentuk Obat</th> --}}
        <th>Kategori Resep</th>
        <th>Stok Masuk</th>
        <th>Supplier</th>
        <th>Kadaluwarsa</th>
        <th width="200px">Action</th>
    </tr>
    @foreach ($drugs as $drug)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $drug->id_obat }}</td>
        <td>{{ $drug->nama_obat }}</td>
        <td>{{ $drug->jenis_obat }}</td>
        <td>{{ $drug->tanggal_masuk }}</td>
        {{-- <td>{{ $drug->bentuk_obat }}</td> --}}
        <td>{{ $drug->kategori_resep }}</td>
        <td>{{ $drug->stok_masuk }}</td>
        <td>{{ $drug->pemasok }}</td>
        <td>{{ $drug->kadaluwarsa }}</td>
        <td>
            <form action="{{ route('drugs.destroy',$drug->id_obat) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('drugs.edit',$drug->id_obat) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $drugs->links() !!}
@endsection