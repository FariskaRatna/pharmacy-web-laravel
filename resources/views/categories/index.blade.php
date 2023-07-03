@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Informasi Kategori Obat</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('categories.create') }}"> Buat Kategori Baru</a>
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
        <th>Kategori Obat</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $category->kategori_obat }}</td>
        <td>
            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $categories->links() !!}
@endsection