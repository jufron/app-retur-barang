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
        Schema::dropIfExists('barang_rusak');

        Schema::create('barang_rusak', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_nota_retur_barang', 50);
            $table->string('quantity_pcs', 50);
            $table->string('quantity_carton', 100);
            $table->date('tanggal_expired');
            $table->date('tanggal_retur');

            // barang id
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->foreign('barang_id')->references('id')->on('barang')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->unsignedBigInteger('reasson_retur_id')->nullable();
            $table->foreign('reasson_retur_id')->references('id')->on('reasson_retur')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('barang_rusak');

        Schema::create('barang_rusak', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 200);
            $table->string('barcode', 100);
            $table->string('nomor_nota_retur_barang', 50);
            $table->string('quantity_pcs', 50);
            $table->string('quantity_carton', 100);
            $table->date('tanggal_expired');
            $table->date('tanggal_retur');

            $table->unsignedBigInteger('reasson_retur_id')->nullable();
            $table->foreign('reasson_retur_id')->references('id')->on('reasson_retur')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
};
