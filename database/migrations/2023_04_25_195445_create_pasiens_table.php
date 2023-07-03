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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien', 30);
            // $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            // $table->integer('usia');
            $table->string('alamat', 50);
            $table->string('telp');
            $table->string('resep')->nullable();
            $table->string('pengirim')->nullable();
            // $table->text('alergi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
