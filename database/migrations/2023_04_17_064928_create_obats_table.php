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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->char('id_obat', 10);
            $table->string('nama_obat', 30);
            $table->string('efek_samping', 50);
            $table->string('dosis', 10);
            $table->string('ready')->default('N');

            $table->unsignedBigInteger('kategori');
            $table->foreign('kategori')->references('id')->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('kategori_obat');
            $table->foreign('kategori_obat')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('satuan');
            $table->foreign('satuan')->references('id')->on('satuans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
