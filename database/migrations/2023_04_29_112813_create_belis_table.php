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
        Schema::create('belis', function (Blueprint $table) {
            $table->id();
            $table->string('faktur');
            // $table->string('item');
            $table->decimal('subtotal', 10, 2);
            $table->integer('qty');
            $table->string('tanggal');
            $table->string('totalKotor');
            $table->string('pajak');
            $table->string('diskon');
            $table->string('totalBersih');
            $table->string('keterangan');

            $table->unsignedBigInteger('supplier');
            $table->foreign('supplier')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('barang');
            $table->foreign('barang')->references('id')->on('obats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('belis');
    }
};
