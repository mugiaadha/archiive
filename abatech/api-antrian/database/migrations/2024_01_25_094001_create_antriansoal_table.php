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
        Schema::create('antriansoal', function (Blueprint $table) {
            $table->string('nomorantrean')->nullable();
            $table->integer('angkaantrean')->nullable();
            $table->string('norm')->nullable();
            $table->string('namapoli')->nullable();
            $table->string('kodepoli')->nullable();
            $table->date('tglpriksa')->nullable();
            $table->string('nomorkartu');
            $table->string('nik');
            $table->string('keluhan');
            $table->string('statusdipanggil')->default(0);
            $table->integer('int')->autoIncrement();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antriansoal');
    }
};
