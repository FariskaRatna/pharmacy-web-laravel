@extends('layouts.main')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />  
@endpush
{{-- @stack('css') --}}

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="row">
                <div class="col-md-12 card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-edit"></i>Data Customer</h3>
                    </div>
                    <hr style="border: 1px solid red;">
                    <form action="{{ route('juals.store') }}" method="POST" id="sample_form">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Pasien</label>
                            <select class="custom-select mr-sm-2 js-example-basic-single form-control" name="pasien" id="pasien">
                                <option value="">Pilih..</option>
                                @foreach ($pelanggan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pasien }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" autocomplete="off" 
                            placeholder="Nama Lengkap"> --}}
                            <input type="text" class="form-control" name="id" id="id" hidden>
                        </div>
                        {{-- <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Nomor Telepon</label>
                            <input type="text" aria-label="telp" autocomplete="off" maxlength="12" 
                            name="telp" id="telp" class="form-control" placeholder="081875421345">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" class="form-control" rows="5"
                             placeholder="Jl.Arjuna V"></textarea>
                        </div> --}}
                        <hr style="border: 1px solid red;">
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="inlineFormCustomSelect">Nomor Resep</label>
                                    <input type="text" autocomplete="off" 
                                    name="no_resep" id="no_resep" class="form-control" placeholder="Isi jika ada">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inlineFormCustomSelect">Pengirim</label>
                                    <input type="text" autocomplete="off" 
                                    name="pengirim" id="pengirim" class="form-control" placeholder="Isi jika ada">
                                </div>
                            </div>
                        </div>
                        <hr style="border: 1px solid red;">
                </div>

                <div class="col-md-12 card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-shopping-cart"> &nbsp; </i>Data Pembelian</h3>
                    </div>
                    {{-- <div> --}}
                        <br>
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Obat</label>
                                <select class="custom-select mr-sm-2 js-example-basic-single form-control" name="obat" id="obat">
                                    <option value="">Pilih Obat</option>
                                    @foreach ($obat as $item)
                                        <option value="{{ $item->idObat }}">{{ $item->namaObat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <label>Stock Tersedia</label>
                                <input type="text" class="stock form-control" readonly name="stock" id="stock">
                            </div>
                            <div class="form-group col-3">
                                <label>No Kwitansi</label>
                                <input type="text" class="form-control" name="nota" id="nota" readonly value="{{ $nomer }}">
                                {{-- <input type="text" class="form-control" name="no" id="no" readonly> --}}
                            </div>
                            <div class="form-group col-3">
                                <label>Tanggal</label>
                                <input type="text" class="form-control" name="tanggal" id="tanggal" value="{{ $tanggals }}" readonly>
                                {{-- <input type="text" class="form-control" name="tanggal" id="tanggal" readonly> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Jumlah Pembelian</label>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    {{-- <button type="button" class="btn btn-danger btn-sm">-</button> --}}
                                    <input type="text" id="qty" name="qty" class="form-control-sm">
                                    {{-- <button type="button" class="btn btn-success btn-sm">+</button> --}}
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label>Harga @satuan</label>
                                <input type="text" class="form-control" maxlength="2" name="harga" id="harga" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label>Diskon</label>
                                <input type="text" class="form-control" maxlength="3" name="diskon" id="diskon">
                            </div>
                            <div class="form-group col-3">
                                <label>Total Harga</label>
                                <input type="text" class="form-control" name="total" id="total" readonly>
                            </div>
                        </div>
                        <hr style="border: 2px solid red;">
                        <div>
                            <button type="submit" id="tambah" name="tambah" class="btn btn-success"><i 
                                class="far fa-save"></i>Simpan</button>
                            </form>
                            <button type="submit" id="buka" name="buka" class="btn btn-primary"><i 
                                class="fas fa-plus"></i>Tambah Obat</button>
                        </div>
                        <div>
                        </div>
                        {{-- <br><br> --}}
                        <?php
                            // $nama = \DB::select('select obats.nama_obat from obats join jualans on obats.id=jualans.item');
                            // $jual = \DB::select('select stock_obats.jual from stock_obats join jualans.')
                            // $jualan = \DB::select('select * from jualans')
                            // $harga = \DB::select('select jual.stock_obats from stock_obats')
                            $name = \DB::select('select * from obats, juals, stock_obats, pasiens where obats.id=juals.item and obats.id=stock_obats.idObat and pasiens.id = jualans.consumer')
                            // $data = \DB::select('select * from jualans')
                        ?>
                        <div class="card card-danger table-responsive">
                            <table class="table table-bordered table-striped table-sm" id="tabel">
                                <thead>
                                    <tr>
                                        {{-- <th>No.</th> --}}
                                        <th>Nama Obat</th>
                                        <th>QTY</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($name as $item)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}
                                            <td>{{ $item->nama_obat }}</td>
                                            <td>{{ $item->jual }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->subtotal }}</td>
                                        </tr>
                                    @endforeach
        
                                </thead>
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
                                <a href="{{ route('jualans.home') }}">
                                    <button type="button" id="btn-bayar" name="btn-bayar" data-toggle="modal"
                                    id="btn-modal" data-target="#modal-secondary" class="btn btn-danger"><i 
                                    class="fas fa-money-bill-wave"></i>Laporan</button>
                                </a>
                                

                
                            </div>
                        </div>
                    </div>

                </div>
                {{-- Kolom Kanan --}}
            </div>
        </div>
    </div>
</div>

@stack('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js" defer></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    {{-- <script src={{ asset("plugins/datatables/jquery.dataTables.js") }}></script> --}}

    <script>
        $.noConflict();

        $(document).ready(function () {
            // loadData()
            $('#obat').select2();
            $('#nama_pasien').select2();
        })

        $('#obat').change(function () {
            let id = $(this).val()
            $.ajax({
                url : "{{ route('getDataObat') }}",
                type : 'post',
                data : {
                    id : id,
                    _token : "{{ csrf_token() }}"
                }, success : function (res) {
                    console.log(res);
                    $('#harga').val(res.jual)
                    $('#stock').val(res.stock)
                }
            })
        })

        

        $(document).on('blur', '#qty', function() {
            let harga = parseInt($('#harga').val())
            let qty = parseInt($(this).val())
            let stock = parseInt($('#stock').val()) - qty
            $('#total').val(qty * harga)
            $('#stock').val(stock)
        })

        $(document).on('submit', 'form', function (event) {
            event.preventDefault();
            $.ajax({
                url : $(this).attr('action'),
                type : $(this).attr('method'),
                typeData : "JSON",
                data : new FormData(this),
                processData : false,
                contentType : false,
                success : function (res) {
                    console.log(res);
                    // $('#btn-tutup').click()
                    // $('#tabel').DataTable().ajax.reload()
                    toastr.success(res.text, 'Sukses')
                    // $('#forms')[0].reset();
                },
                error : function (xhr) {
                    toastr.error(xhr.responseJSON.text, 'Gagal!')
                }
            })
        })

        // setTimeout(() => {
        //     $('#tabel').DataTable({
        //     serverside: true,
        //     processing: true,
        //     ajax: {
        //         url : "{{ route('jualans.dataTable') }}",
        //         data: {
        //             id : $('#nota').val()
        //         }
        //     }, 
        //     columns: [
        //         {
        //             data: null,
        //             "sortable": false,
        //             render: function (data, type, row, meta) {
        //                 return meta.row + meta.settings._iDisplayStart + 1;
        //             }
        //         },
        //         { data: 'nama_Obat', name: 'nama_Obat' },
        //         { data: 'qty', name: 'qty' },
        //         { data: 'jual', name: 'jual' },
        //         { data: 'subtotal', name: 'subtotal' },
        //             // { data: 'tanggal_masuk', name: 'tanggal_masuk' },
        //             // { data: 'kadaluwarsa', name: 'kadaluwarsa' },
        //             // { data: 'keterangan', name: 'keterangan' },
        //         { data: 'action', name: 'action', orderable: false },

        //     ]
        // })     
        // }, 1100);
       
    
    </script>



@endsection
    
