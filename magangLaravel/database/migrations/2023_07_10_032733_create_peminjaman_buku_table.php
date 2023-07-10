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
        Schema::create('peminjaman_buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAnggota');
            $table->foreign('idAnggota')->references('id')->on('anggota')->onDelete('restrict');
            $table->unsignedBigInteger('idBuku');
            $table->foreign('idBuku')->references('id')->on('buku')->onDelete('restrict');
            $table->date('tanggalPinjam')->required();
            $table->date('tanggalKembali')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_buku');
    }
};
