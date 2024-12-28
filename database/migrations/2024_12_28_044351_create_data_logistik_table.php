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
        Schema::create('data_logistik', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('no_nota_retur_barang', 50);
            $table->string('nama_toko', 200);
            $table->string('total_harga', 20);
            $table->string('jumlah_barang', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_logistik');
    }
};
