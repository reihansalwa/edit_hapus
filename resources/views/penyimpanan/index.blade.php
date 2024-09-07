@extends('layouts.app')

@section('heading', 'Data Penyimpanan')

@section('title', 'Data Penyimpanan')

@section('content')
    <div class="card-header">
        <a href="{{ route('create-penyimpanan') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Stok Tersedia</th>
                    <th>Harga Satuan</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->id }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->deskripsi }}</td>
                        <td>{{ $barang->stok_tersedia }}</td>
                        <td>{{ $barang->harga_satuan }}</td>
                        <td>{{ $barang->kategori }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('edit-penyimpanan', [$barang->id]) }}" class="btn btn-success mr-2">Edit</a>
                                <form action="{{ route('delete-penyimpanan', [$barang->id]) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Hapus">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
