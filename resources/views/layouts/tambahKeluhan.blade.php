{{-- @extends('layouts.main')

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12" id="forms">
        <div class="form-group">
            <strong>Nama Lengkap:</strong> 
            <p id="namaPengadu" name="namaPengadu"></p>
        </div>
    </div>

    @stack('js')
    <script src={{ asset("plugins/datatables/jquery.dataTables.js") }}></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script>
    <script>
        $(document).on('click', '.show', function () {
        $('#forms').attr('action', "{{ route('pengaduan.show') }}")
        let id = $(this).attr('id')
        $.ajax({
            url : "{{ route('pengaduan.show') }}",
            type : 'get',
            data : {
                id : id,
                _token : "{{ csrf_token() }}"
            },
            success: function (res) {
                console.log(res);
                $('#namaPengadu').val(res.namaPengadu)
            },
            error : function (xhr) {
                console.log(xhr);
            }
        })
    })
    </script>
@endsection --}}

@extends('layouts.main')
@section('content')
<?php
    $data = \DB::select('select * from pengaduans')
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Data Pengaduan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pengaduan.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Lengkap:</strong>
            {{ $data->namaPengadu }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Usia:</strong>
            {{ $data->usia }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jenis Kelamin:</strong>
            {{ $data->gender }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>No.Telp:</strong>
            {{ $data->telp }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Alamat:</strong>
            {{ $data->alamat }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tanggal Kunjungan:</strong>
            {{ $data->tgl }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bagian Pengaduan:</strong>
            {{ $data->bagianKeluhan }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Pengaduan:</strong>
            {{ $data->keluhan }}
        </div>
    </div>
</div>

@endsection