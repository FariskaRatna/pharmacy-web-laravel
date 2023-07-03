@extends('layouts.main')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="col-12 card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-shopping-cart"> &nbsp; </i>Data Pembelian</h3>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="post" id="form-beli">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-3">
                                            <label>No Pembelian</label>
                                            <input type="text" class="form-control" name="faktur" id="faktur" value="{{ $nomer }}" readonly>
                                            {{-- <input type="text" class="form-control" name="faktur" id="faktur" readonly> --}}
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Tanggal</label>
                                            <input type="text" class="form-control" name="tanggal" id="tanggal" value="{{ $time }}" readonly>
                                            {{-- <input type="text" class="form-control" name="tanggal" id="tanggal"  readonly> --}}
                                        </div>
                                        <div class="form-group col-3">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Nama Supplier</label>
                                            <select class="custom-select mr-sm-2 js-example-basic-single fomr-control"
                                            required name="supplier" id="supplier">
                                                <option value="">~Pilih~</option>
                                                @foreach ($supp as $id => $nama_supplier)
                                                    <option value="{{ $id }}">{{ $nama_supplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group col-3">
                                            <label for="Kode Obat">
                                                <select name="kode" id="kode" data-width="100%" class="form-control" required>
                                                    <option value="">Masukkan kode</option>
                                                    @foreach ($kode as $key)
                                                        <option value="{{ $key->id }}">{{ $key->id_obat }}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div> --}}

                                        <div class="row">
                                            <div class="form-group col-3">
                                                <label>Obat</label>
                                                {{-- <input type="text" class="form-control" name="barang" id="barang" autocomplete="off"> --}}
                                                <select class="custom-select mr-sm-2 js-example-basic-single form-control" name="obat" id="obat">
                                                    <option value="">Pilih Obat</option>
                                                    @foreach ($obats as $item)
                                                        <option value="{{ $item->idObat }}">{{ $item->namaObat }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <div class="form-group col-3">
                                                <label>Harga @satuan</label>
                                                <input type="text" class="form-control" maxlength="9" name="harga" id="harga" disabled>
                                            </div> --}}
                                            <div class="form-group col-3">
                                                <label>Jumlah Pembelian</label>
                                                <input type="text" class="form-control" maxlength="4" name="qty" id="qty" autocomplete="off">
                                            </div>
                                            {{-- <div class="form-group col-3">
                                                <label>Sub Total</label>
                                                <input type="text" class="form-control" name="subtotal" id="subtotal" autocomplete="off" readonly>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            {{-- <div class="form-group col-3">
                                                <label for="inlineFormCustomSelect" class="mr-sm-2">Pajak</label>
                                                <input type="text" class="form-control" maxlength="2" name="pajak" id="pajak" autocomplete="off">
                                            </div> --}}
                                            {{-- <div class="form-group col-3">
                                                <label>Diskon</label>
                                                <input type="text" class="form-control" maxlength="2" name="diskon" id="diskon" autocomplete="off">
                                            </div> --}}

                                            <div class="form-group col-6">
                                                <label>Keterangan</label>
                                                <input type="text" class="form-control" name="keterangan" id="keterangan" autocomplete="off">
                                            </div>
                                        </div>
                                        <hr style="border: 2px solid red">
                                        <div>
                                            <button type="submit" id="tambahsimpan" name="tambahsimpan" class="btn btn-danger"><i class="far fa-save"></i></i>&nbsp;&nbsp;&nbsp;Simpan</button>
                                            <button type="button" id="buka" name="buka" class="btn btn-danger"><i class="far fa-save"></i></i>&nbsp;&nbsp;&nbsp;Tambah Item</button>
                                        </div>
                                    </form>
                                    <br><br>
                                    <div class="card card-danger table-responsive">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fas fa-shopping-cart"> &nbsp; </i>Keranjang</h3>
                                        </div> 
                                        <table class="table table-bordered table-striped table-sm" id="tabel">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Supplier</th>
                                                    <th>Nama Obat</th>
                                                    <th>Harga</th>
                                                    <th>QTY</th>
                                                    <th>Pajak</th>
                                                    <th>Total Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <button type="button" id="proses" name="proses" class="btn btn-danger"><i class="nav-icon far fa-save"></i></i> &nbsp;&nbsp;&nbsp; ACC / Proses</button>
                                </div>

                                <div class="col-3">
                                    {{-- <div class="form-group">
                                        <label>Dibayar Dengan</label>
                                        <select name="metoode" id="metode" id="form-control">
                                            <option value="">Pilih..</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Hutang">Hutang</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Kotor</label>
                                        <input type="text" class="form-control" autocomplete="off" name="ttlkotor" id="ttlkotor" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Besar Pajak</label>
                                        <input type="text" class="form-control" autocomplete="off" name="ttlpajak" id="ttlpajak" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Besar Diskon</label>
                                        <input type="text" class="form-control" autocomplete="off" name="ttldiskon" id="ttldiskon" value="0" readonly maxlength="2">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Bersih / Yang Harus Dibayar</label>
                                        <input type="text" readonly class="form-control" autocomplete="off" name="grand" id="grand">
                                    </div>
                                    <div class="form-group">
                                        <label>Pembayaran Sebesar</label>
                                        <input type="text" class="form-control" autocomplete="off" name="dibayar" id="dibayar" 
                                        placeholder="Kosongkan Jika Metode Pembayaran Dengan Cash">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" name="keteranganbeli" id="keteranganbeli">
                                    </div> --}}

                                    {{-- <button type="button" id="simpanBeli" name="simpanBeli" class="btn btn-danger"><i 
                                        class="nav-icon far fa-save"></i></i> &nbsp;&nbsp;&nbsp; Simpan</button>
                                        <form action="{{ route(cetakNotaBeli) }}" method="post">
                                        @csrf
                                            <input type="text" aria-label="telp" autocomplete="off" maxlength="12" name="kwitansi"
                                            hidden id="kwitansi" class="form-control" value="{{ $nomer }}">

                                            <button id="cetak" name="cetak" class="btn btn-danger float-left"><i 
                                                class="far fa-file-pdf"></i> &nbsp; Cetak Faktur</button>
                                        </form>
                                        <button class="transaksiBaru btn btn-warning btn-block" id="baru">Pembelian Baru</button> --}}
                                </div>
                            </div>
                            {{-- akhir roe --}}
                        </div>
                    </div>
                    {{-- kolom kanan --}}
                </div>
            </div>
        </div>
        
    </div>

    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    {{-- <script src={{ asset("plugins/datatables/jquery.dataTables.js") }}></script> --}}

    <script>
        $(document).ready(function () {
            $('#supplier').select2();
            // $('#kode').select2({tags: true})
        }) 

        // $(document).on('change', '#kode', function () {
        //     cariKode($(this).val())
        // })
        // function cariKode(id_obat) {
        //     $.ajax({
        //         url : "{{ route('cariKode') }}",
        //         type : 'post',
        //         data : {
        //             kode : id_obat;
        //         }, 
        //         success : function (res) {
        //             if (res.length > 0) {

        //             }
        //             console.log(res)
        //         },
        //         error : function (xhr) {
        //             console.log(xhr)
        //         }
        //     })
        // }

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
                }
            })
        })

        $(document).on('blur', '#qty', function() {
            let harga = parseInt($('#harga').val())
            let qty = parseInt($(this).val())
            $('#subtotal').val(qty * harga)
        })
    </script>
    @endpush
@endsection