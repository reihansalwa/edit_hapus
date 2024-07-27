<?php

namespace App\Http\Controllers;

use App\Models\PenyimpananBarang;
use Illuminate\Http\Request;

class PenyimpananBarangController extends Controller
{
    public function index()
    {
        $barangs = PenyimpananBarang::all();
        return view('welcome', compact('barangs'));
    }

    public function create()
    {
        $barangs = PenyimpananBarang::all();
        return view('create', compact('barangs'));
    }

    public function store(Request $request)
    {
        PenyimpananBarang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok_tersedia' => $request->stok_tersedia,
            'harga_satuan' => $request->harga_satuan,
            'kategori' => $request->kategori,
        ]);

        session()->flash('success', 'Barang baru berhasil ditambahkan!');

        return redirect('/');
    }

    public function edit(PenyimpananBarang $barang)
    {
        $barangs = PenyimpananBarang::all();
        return view('edit', compact('barang', 'barangs'));
    }

    public function update(Request $request, PenyimpananBarang $barang)
    {
        $attr = $request->all();

        $barang->update($attr);

        session()->flash('success', 'Barang berhasil diperbaharui!');

        return redirect('/');
    }

    public function delete(PenyimpananBarang $barang)
    {
        $barang->delete();

        session()->flash('success', 'Barang berhasil dihapus!');

        return redirect('/');
    }

}
