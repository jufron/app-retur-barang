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
        Schema::table('barang_rusak', function (Blueprint $table) {
            $table->dropColumn('reasson_retur');

            $table->unsignedBigInteger('reasson_retur_id')->nullable();
            $table->foreign('reasson_retur_id')
                    ->references('id')
                    ->on('reasson_retur')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang_rusak', function (Blueprint $table) {
            $table->dropForeign(['reasson_retur_id']);
            $table->dropIfExists('reasson_retur_id');
            
            $table->string('reasson_retur', 200);
        });
    }
};
