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
        Schema::dropIfExists('kategory_barang');

        Schema::create('kategory', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategory');

        Schema::create('kategory_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 200);
            $table->string('barcode_barang', 10);
            $table->string('kategory_barang', 100);
            $table->timestamps();
        });
    }
};
