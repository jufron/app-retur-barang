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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barcode');
            $table->string('nama_barang', 200);
            $table->text('deskripsi_barang')->nullable();
            $table->unsignedBigInteger('kategory_id')->nullable();
            $table->foreign('kategory_id')->references('id')->on('kategory')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
