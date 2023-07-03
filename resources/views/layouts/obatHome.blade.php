@extends('layouts.main')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-stripped" id="tabel" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Efek Samping</th>
                            <th>Dosis</th>
                            <th>Jenis Obat</th>
                            <th>Kategori Resep</th>
                            <th>Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- button modal --}}

    <button type="button" class="btn btn-info" id="btn-tambah" data-toggle="modal" data-target="#modal-info">
        Tambah
    </button>

    {{-- modal --}}
    <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Data Obat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{-- isian --}}
              <form action="{{ route('obat.store') }}" method="post" id="forms">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Obat</label>
                    <input type="text" class="form-control" id="id_obat" autocomplete="off" name="id_obat" placeholder="Kode Obat">
                    <input type="text" hidden class="form-control" id="id" name="id" placeholder="Kode Obat">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Obat</label>
                    <input type="text" class="form-control" id="nama_obat" autocomplete="off" name="nama_obat" placeholder="Nama Obat">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Efek Samping</label>
                    <input type="text" class="form-control" id="efek_samping" autocomplete="off" name="efek_samping" placeholder="Efek Samping">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dosis</label>
                    <input type="text" class="form-control"  id="dosis" autocomplete="off" name="dosis" placeholder="Dosis">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Obat</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">Pilih Jenis Obat</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control"  id="kategori" name="kategori" placeholder="Jenis Obat"> --}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Resep</label>
                    <select name="kategori_obat" id="kategori_obat" class="form-control">
                        <option value="">Pilih Kategori Resep</option>
                        @foreach ($kategori_obat as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori_obat }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control"  id="kategori_obat" name="kategori_obat" placeholder="Kategori Resep"> --}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Satuan</label>
                    <select name="satuan" id="satuan" class="form-control">
                        <option value="">Pilih Satuan</option>
                        @foreach ($satuan as $item)
                            <option value="{{ $item->id }}">{{ $item->satuan }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control"  id="satuan" name="satuan" placeholder="Satuan"> --}}
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" class="form-control" rows="10"></textarea>
                </div>  --}}
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" name="batal" id="btn-tutup" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" id="simpan" class="btn btn-outline-light">Save</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    @stack('js')
    <script src={{ asset("plugins/datatables/jquery.dataTables.js") }}></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script>
    $(document).ready(function () {
        loaddata()
        // toastr.info('Are you the 6 fingered man?')
    })

    function loaddata() {
        $('#tabel').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url : "{{ route('obat.index') }}"
            },
            columns: [
                { data: 'id_obat', name: 'id_obat' },
                { data: 'nama_obat', name: 'nama_obat' },
                { data: 'efek_samping', name: 'efek_samping' },
                { data: 'dosis', name: 'dosis' },
                { data: 'types', name: 'types' },
                { data: 'categories', name: 'categories' },
                { data: 'satuans', name: 'satuans' },
                { data: 'action', name: 'action', orderable: false },
            ]
        })
    }

    // function number(evt) {
    //     var charCode = (evt.which) ? evt.which : event:keyCode
    //         if (charCode > 31 && (charCode < 48 || charCode > 57))
    //             return false;
    //         return true;
    // }

    $(document).on('submit', 'form', function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            typeData: "JSON",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                console.log(res);
                $('#btn-tutup').click()
                $('#tabel').DataTable().ajax.reload()
                $('#forms')[0].reset();
                toastr.success(res.text, 'Sukses')
            }, 
            error : function (xhr) {
                toastr.error(xhr.responseJSON.text, 'Gagal!')
            }
        })
    })

    $(document).on('click', '.edit', function () {
        $('#forms').attr('action', "{{ route('obat.updates') }}")
        let id = $(this).attr('id')
        $.ajax({
            url : "{{ route('obat.edits') }}",
            type : 'post',
            data : {
                id : id,
                _token : "{{ csrf_token() }}"
            },
            success: function (res) {
                console.log(res);
                $('#id').val(res.id)
                $('#id_obat').val(res.id_obat)
                $('#nama_obat').val(res.nama_obat)
                $('#efek_samping').val(res.efek_samping)
                $('#dosis').val(res.dosis)
                $('#kategori').val(res.kategori)
                $('#kategori_obat').val(res.kategori_obat)
                $('#satuan').val(res.satuan)
                $('#btn-tambah').click()
            },
            error : function (xhr) {
                console.log(xhr);
            }
        })
    })

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
                        url : "{{ route('obat.hapus') }}",
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
    
