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
        Schema::create('kits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id');
            $table->boolean('tumbler')->default(0);
            $table->boolean('buku_panduan')->default(0);
            $table->boolean('lanyard')->default(0);
            $table->boolean('topi')->default(0);
            $table->boolean('baju')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kits');
    }
};
