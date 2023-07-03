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
        Schema::create('juals', function (Blueprint $table) {
            $table->id();
            $table->string('nota')->nullable();
            // $table->string('status');
            $table->string('tanggal');
            $table->integer('qty');
            // $table->string('pajak');
            $table->decimal('subtotal', 10, 2);
            // $table->string('consumer');
            $table->decimal('diskon')->nullable();
            // $table->string('item');
            $table->timestamps();

            $table->unsignedBigInteger('item');
            $table->foreign('item')->references('id')->on('obats')->onDelete('cascade');
            $table->unsignedBigInteger('consumer');
            $table->foreign('consumer')->references('id')->on('pasiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juals');
    }
};
