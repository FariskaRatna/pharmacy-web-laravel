@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Informasi Pembelian</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('jualans.home') }}"> Buat Pembelian Baru</a>
        </div>
    </div>
</div>

<div class="card card-danger table-responsive">
    <table class="table table-bordered table-striped table-sm" id="tabel">
        <tr>
            {{-- <th>No.</th> --}}
            <th>Nama Obat</th>
            <th>QTY</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Action</th>
        </tr>
        @foreach ($jualans as $item)
            <tr>
                <td>{{ $item->nama_Obat }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->jual }}</td>
                <td>{{ $item->subtotal }}</td>
                <td>
                    <a href="">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
<div class="row">
    <div class="col-3">

    </div>
    <div class="col-3">
        
    </div>
    <div class="col-3">
        
    </div>
    <div class="col-3">
        {{-- <form action="" method="post">
            @csrf
            <input type="text" aria-label="telp" autocomplete="off"
            maxlength="12" name="kwitansi" hidden id="kwitansi" class="form-control" value="nomer">

            <button id="cetak" name="cetak" class="btn btn-danger float-left"><i class="far fa-file-pdf"></i>
             &nbsp; Cetak Slips</button>
        </form> --}}

        <button type="button" id="btn-bayar" name="btn-bayar" data-toggle="modal"
        id="btn-modal" data-target="#modal-secondary" class="btn btn-danger"><i 
        class="fas fa-money-bill-wave"></i>Proses</button>


    </div>
@endsection