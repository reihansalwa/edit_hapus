<?php

namespace App\Http\Controllers;

use App\Models\PenyimpananBarang;
use App\Models\User;
use Illuminate\Http\Request;

class PenyimpananBarangController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        
        $user = User::where('id', $user->id)->first();
        
        $barangs = PenyimpananBarang::all();

        return view('penyimpanan.index', compact('barangs', 'user'));
    }

    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        
        $user = User::where('id', $user->id)->first();
        
        return view('penyimpanan.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|max:50',
            'deskripsi' => 'required',
            'stok_tersedia' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'kategori' => 'required',
        ]);

        PenyimpananBarang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok_tersedia' => $request->stok_tersedia,
            'harga_satuan' => $request->harga_satuan,
            'kategori' => $request->kategori,
        ]);

        session()->flash('success', 'Data penyimpanan baru berhasil ditambahkan!');

        return redirect()->route('index-penyimpanan');
    }

    public function edit(Request $request, PenyimpananBarang $penyimpananBarang)
    {
        $user = $request->session()->get('user');
        
        $user = User::where('id', $user->id)->first();

        return view('penyimpanan.edit', compact('penyimpananBarang', 'user'));
    }

    public function update(Request $request, PenyimpananBarang $penyimpananBarang)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|max:50',
            'deskripsi' => 'required',
            'stok_tersedia' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'kategori' => 'required',
        ]);

        $penyimpananBarang->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok_tersedia' => $request->stok_tersedia,
            'harga_satuan' => $request->harga_satuan,
            'kategori' => $request->kategori,
        ]);
        
        session()->flash('success', 'Data penyimpanan berhasil diperbaharui!');

        return redirect()->route('index-penyimpanan');
    }

    public function delete(PenyimpananBarang $penyimpananBarang)
    {
        $penyimpananBarang->delete();

        session()->flash('success', 'Data penyimpanan berhasil dihapus!');

        return redirect()->route('index-penyimpanan');
    }
}
