@extends('layouts.app')

@section('heading', 'Tambah Data Penyimpanan')

@section('title', 'Tambah Data Penyimpanan')

@section('content')
<div class="card-body">
    <form method="POST" action="{{ route("update-penyimpanan", [$penyimpananBarang->id]) }}">
    @csrf
    @method('PUT')
        <div class="mb-2">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control mb-2" id="nama_barang" name="nama_barang" required placeholder="Masukkan nama barang" value="{{ $penyimpananBarang->nama_barang }}">
        
            <label for="stok_tersedia">Stok Tersedia</label>
            <input type="number" class="form-control mb-2" id="stok_tersedia" name="stok_tersedia" min="1" required placeholder="Masukkan stok tersedia" value="{{ $penyimpananBarang->stok_tersedia }}">
            
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" class="form-control mb-2" id="harga_satuan" name="harga_satuan" min="1" step="0.01" required placeholder="Masukkan harga satuan" value="{{ $penyimpananBarang->harga_satuan }}">
        
            <label for="kategori">Kategori</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="kategoriPakaian" name="kategori" value="Pakaian" {{ $penyimpananBarang->kategori == "Pakaian" ? 'checked' : '' }}>
                <label class="form-check-label" for="kategoriPakaian">Pakaian</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="kategoriSepatu" name="kategori" value="Sepatu" {{ $penyimpananBarang->kategori == "Sepatu" ? 'checked' : '' }}>
                <label class="form-check-label" for="kategoriSepatu">Sepatu</label>
            </div>
            <div class="form-check mb-2">
                <input type="radio" class="form-check-input" id="kategoriAksesoris" name="kategori" value="Aksesoris" {{ $penyimpananBarang->kategori == "Aksesoris" ? 'checked' : '' }}>
                <label class="form-check-label" for="kategoriAksesoris">Aksesoris</label>
            </div>
            
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control mb-2" id="deskripsi" name="deskripsi" rows="3" required placeholder="Masukkan deskripsi barang">{{ $penyimpananBarang->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('index-penyimpanan') }}" class="btn btn-danger">Tutup</a>
    </form>
</div>

@endsection

