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
        Schema::create('barang_sortir', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_nota_retur_barang', 50);
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->foreign('barang_id')->references('id')->on('barang')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->string('quantity_pcs', 50);
            $table->string('quantity_carton', 100);
            $table->date('tanggal_expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_sortir');
    }
};
