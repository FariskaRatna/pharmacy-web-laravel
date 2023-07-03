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
                        <th>Nama Pengadu</th>
                        {{-- <th>Usia</th> --}}
                        {{-- <th>Jenis Kelamin</th> --}}
                        {{-- <th>Telepon</th> --}}
                        {{-- <th>Alamat</th> --}}
                        <th>Tanggal</th>
                        <th>Bagian Kunjungan</th>
                        <th>Keluhan</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

{{-- button modal --}}

<button type="button" class="btn btn-info" id="btn-tambah" data-toggle="modal" data-target="#modal-info" >
    Tambah
</button>

{{-- modal --}}
<div class="modal fade" id="modal-info">
    <div class="modal-dialog">
      <div class="modal-content bg-info">
        <div class="modal-header">
          <h4 class="modal-title">Data Pengaduan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- isian --}}
          <form action="{{ route('pengaduan.store') }}" method="post" id="forms">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="text" class="form-control" id="namaPengadu" autocomplete="off" name="namaPengadu" placeholder="Nama Lengkap">
                <input type="text" hidden class="form-control" id="id" name="id" placeholder="Kode Obat">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Usia</label>
                <input type="text" class="form-control" id="usia" autocomplete="off" name="usia" placeholder="Usia">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Pilih</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Telepon</label>
                <input type="text" class="form-control"  id="telp" autocomplete="off" name="telp" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control"  id="alamat" autocomplete="off" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Kunjungan</label>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="tgl" id="tgl" autocomplete="off" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Bagian Pengaduan</label>
                <select name="bagianKeluhan" id="bagianKeluhan" class="form-control">
                    <option value="">Pilih Bagian</option>
                    <option value="Obat">Obat</option>
                </select>
                {{-- <input type="text" class="form-control"  id="kategori" name="kategori" placeholder="Jenis Obat"> --}}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Keluhan</label>
                <textarea name="keluhan" id="keluhan" cols="30" class="form-control" rows="10"></textarea>
            </div> 
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
})

function loaddata() {
    $('#tabel').DataTable({
        serverside: true,
        processing: true,
        ajax: {
            url : "{{ route('pengaduan.index') }}"
        },
        columns: [
            { data: 'namaPengadu', name: 'namaPengadu' },
            // { data: 'usia', name: 'usia' },
            // { data: 'gender', name: 'gender' },
            // { data: 'telp', name: 'telp' },
            // { data: 'alamat', name: 'alamat' },
            { data: 'tgl', name: 'tgl' },
            { data: 'bagianKeluhan', name: 'bagianKeluhan' },
            { data: 'keluhan', name: 'keluhan' },
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
    $('#forms').attr('action', "{{ route('pengaduan.updates') }}")
    let id = $(this).attr('id')
    $.ajax({
        url : "{{ route('pengaduan.edits') }}",
        type : 'post',
        data : {
            id : id,
            _token : "{{ csrf_token() }}"
        },
        success: function (res) {
            console.log(res);
            $('#id').val(res.id)
            $('#namaPengadu').val(res.namaPengadu)
            $('#usia').val(res.usia)
            $('#gender').val(res.gender)
            $('#telp').val(res.telp)
            $('#alamat').val(res.alamat)
            $('#tgl').val(res.tgl)
            $('#bagianKeluhan').val(res.bagianKeluhan)
            $('#keluhan').val(res.keluhan)
            $('#btn-tambah').click()
        },
        error : function (xhr) {
            console.log(xhr);
        }
    })
})

// $(document).on('click', '.show', function() {
//     let id = $(this).attr('id')
//     $.ajax({
//         url : "{{ route('pengaduan.show') }}",
//         type : 'get',
//         data : {
//             id : id,
//             _token : "{{ csrf_token() }}"
//         }, 
//         success : function (res) {
//             console.log(res);
//             $('#id').val(res.id)
//             $('#namaPengadu').val(res.namaPengadu)
//             $('#usia').val(res.usia)
//             $('#gender').val(res.gender)
//             $('#telp').val(res.telp)
//             $('#alamat').val(res.alamat)
//             $('#tgl').val(res.tgl)
//             $('#bagianKeluhan').val(res.bagianKeluhan)
//             $('#keluhan').val(res.keluhan)
//         },
//         error : function (xhr) {
//             console.log(xhr);
//         }
//     })
// })


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
                    url : "{{ route('pengaduan.hapus') }}",
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