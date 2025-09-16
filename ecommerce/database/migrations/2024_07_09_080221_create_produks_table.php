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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10);
            $table->string('nama', 45);
            $table->string('gambar');
            $table->double('harga');
            $table->integer('stok');
            $table->integer('rating')->nullable()->default(0);
            $table->integer('min_stok');
            $table->unsignedBigInteger('jenis_produk_id');
            $table->text('deskripsi')->nullable();
            $table->foreign('jenis_produk_id')->references('id')->on('jenis_produks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
