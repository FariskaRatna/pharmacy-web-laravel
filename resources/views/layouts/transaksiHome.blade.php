@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Informasi Pembelian</h1>
        </div>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="table table-stripped" id="tabel" style="width: 100%">
                <thead>
                    <tr>
                        <th>Nota</th>
                        <th>Nama Pembeli</th>
                        <th>Nama Obat</th>
                        <th>QTY</th>
                        <th>Harga</th>
                        <th>Total</th>
                        {{-- <th>Kategori Resep</th>
                        <th>Satuan</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="pull-right">
    <a class="btn btn-success" href="{{ route('jualans.index') }}"> Tambah Pembelian</a>
</div>

    @stack('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    {{-- script src={{ asset("plugins/datatables/jquery.dataTables.js") }}></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
          loadData();  
        })

        function loadData() {
            $('#tabel').DataTable({
                serverside: true,
                processing: true,
                ajax: {
                    url : "{{ route('jualans.home') }}",
                }, 
                columns: [
                    { data: 'nota', name: 'nota'},
                    { data: 'customer', name: 'customer'},
                    { data: 'nama_obat', name: 'nama_obat' },
                    { data: 'qty', name: 'qty' },
                    { data: 'jual', name: 'jual' },
                    { data: 'subtotal', name: 'subtotal' },
                    { data: 'action', name: 'action', orderable: false },
    
                ]
            })     
        }

        $(document).on('click', '.hapus', function () {
        let id = $(this).attr('id')
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Kamu tidak bisa mengembalikannya lagi nanti!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : "{{ route('jualans.hapus') }}",
                        type : 'post',
                        data : {
                            id : id,
                            _token : "{{ csrf_token() }}"
                        },
                        success: function (res, status) {
                            if (status = '200') {
                                setTimeout(() => {
                                    Swal.fire({
                                        position: 'center-center',
                                        icon: 'success',
                                        title: 'Data berhasil dihapus',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then((res) => {
                                            $('#tabel').DataTable().ajax.reload()
                                        })
                                });
                            }
                        },
                        error: function (xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Gagal menghapus!',
                            })
                        }
                    })
                }
            })
    })
        
    </script>
@endsection