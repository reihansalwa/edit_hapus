<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penyimpanan_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 50);
            $table->text('deskripsi')->nullable();
            $table->integer('stok_tersedia');
            $table->integer('harga_satuan');
            $table->string('kategori', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyimpanan_barangs');
    }
};
