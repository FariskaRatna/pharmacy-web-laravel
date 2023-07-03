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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->char('id_obat', 10);
            $table->string('nama_obat', 50);
            $table->string('jenis_obat', 10);
            $table->date('tanggal_masuk')->nullable();
            $table->string('kategori_resep', 10);
            $table->string('stok_masuk', 10);
            $table->string("pemasok", 20);
            $table->date('kadaluwarsa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
};
