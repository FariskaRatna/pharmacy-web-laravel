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
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->integer('stok_masuk');
            $table->integer('stok_keluar');
            $table->decimal('beli', 10, 2);
            $table->decimal('jual', 10, 2);
            $table->integer('stok');
            $table->date('tanggal_masuk');
            $table->date('kadaluwarsa');
            $table->text('keterangan');

            $table->unsignedBigInteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
