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
        Schema::create('barang_rusak', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 200);
            $table->string('barcode', 100);
            $table->string('nomor_nota_retur_barang', 50);
            $table->string('quantity_pcs', 50);
            $table->string('quantity_carton', 100);
            $table->date('tanggal_expired');
            $table->date('tanggal_retur');
            $table->string('reasson_retur', 200);
            // relation user_id
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_rusak');
    }
};
