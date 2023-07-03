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
        Schema::create('stock_obats', function (Blueprint $table) {
            $table->id();
            $table->integer('masuk');
            $table->integer('keluar');
            $table->decimal('beli', 10, 2);
            $table->decimal('jual', 10, 2);
            $table->integer('stock');
            $table->date('tanggal_masuk');
            $table->date('kadaluwarsa');
            $table->text('keterangan');

            $table->unsignedBigInteger('idObat');
            $table->foreign('idObat')->references('id')->on('obats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_obats');
    }
};
