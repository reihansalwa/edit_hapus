@extends('layouts.app')

@section('heading', 'Ubah Data Penyimpanan')

@section('title', 'Ubah Data Penyimpanan')

@section('content')
<div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route("store-penyimpanan") }}">
    @csrf
        <div class="mb-2">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control mb-2" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang">
        
            <label for="stok_tersedia">Stok Tersedia</label>
            <input type="number" class="form-control mb-2" id="stok_tersedia" name="stok_tersedia" min="1" placeholder="Masukkan stok tersedia">
            
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" class="form-control mb-2" id="harga_satuan" name="harga_satuan" min="1" step="0.01" placeholder="Masukkan harga satuan">
        
            <label for="kategori">Kategori</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="kategoriPakaian" name="kategori" value="Pakaian" checked>
                <label class="form-check-label" for="kategoriPakaian">Pakaian</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="kategoriSepatu" name="kategori" value="Sepatu">
                <label class="form-check-label" for="kategoriSepatu">Sepatu</label>
            </div>
            <div class="form-check mb-2">
                <input type="radio" class="form-check-input" id="kategoriAksesoris" name="kategori" value="Aksesoris">
                <label class="form-check-label" for="kategoriAksesoris">Aksesoris</label>
            </div>
            
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control mb-2" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi barang"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('index-penyimpanan') }}" class="btn btn-danger">Tutup</a>
    </form>
</div>

@endsection