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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('instansi');
            $table->string('unit_kerja');
            $table->string('jabatan');
            $table->string('golongan');
            $table->boolean('jenis_kelamin');
            $table->string('no_wa')->nullable()->unique();
            $table->string('no_rek')->nullable()->unique();
            $table->string('nama_bank')->nullable();
            $table->string('ukuran_baju', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
