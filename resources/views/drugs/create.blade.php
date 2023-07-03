@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Data</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('drugs.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('drugs.store') }}" method="POST">
    @csrf
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID Obat:</strong>
                <input type="text" name="id_obat" class="form-control" placeholder="ID Obat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Obat:</strong>
                <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Obat:</strong>
                {{-- <input type="text" name="jenis_obat" class="form-control" placeholder="Jenis Obat"> --}}
                <select name="jenis_obat" id="jenis_obat" class="form-select input">
                    <option value="">-Pilih-</option>
                    @foreach ($types as $item)
                        <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Masuk:</strong>
                {{-- <input type="text" name="dosis" class="form-control" placeholder="Dosis"> --}}
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="tanggal_masuk" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bentuk Obat:</strong>
                <input type="text" name="bentuk_obat" class="form-control" placeholder="Bentuk Obat">
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori Obat:</strong>
                {{-- <input type="text" name="kategori_resep" class="form-control" placeholder="Kategori Obat"> --}}
                <select name="kategori_resep" id="kategori_resep" class="form-select input">
                    <option value="">-Pilih-</option>
                    @foreach ($categories as $row)
                        <option value="{{ $row->kategori_obat }}">{{ $row->kategori_obat }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok Masuk:</strong>
                <input type="text" name="stok_masuk" class="form-control" placeholder="Stok Masuk">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Supplier:</strong>
                {{-- <input type="text" name="kategori_resep" class="form-control" placeholder="Kategori Obat"> --}}
                <select name="pemasok" id="pemasok" class="form-select input">
                    <option value="">-Pilih-</option>
                    @foreach ($brands as $item)
                        <option value="{{ $item->nama_supplier }}">{{ $item->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kadaluwarsa:</strong>
                {{-- <input type="text" name="dosis" class="form-control" placeholder="Dosis"> --}}
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="kadaluwarsa" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   

</form>
    
@endsection