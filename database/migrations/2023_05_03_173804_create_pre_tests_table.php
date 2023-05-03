<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pre_tests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pretest')->unique();
            $table->string('nama_bank');
            $table->integer('jumlah_soal');
            $table->time('durasi')->format('i:s');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_tests');
    }
};
