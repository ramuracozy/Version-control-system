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
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_tokoh', 45);
            $table->string('komentar', 200);
            $table->integer('rating')->nullable();
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('kategori_tokoh_id');
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->foreign('kategori_tokoh_id')->references('id')->on('kategori_tokohs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};
