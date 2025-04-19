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
        Schema::create('nilai_sub_kriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_kriteria_id')->constrained('sub_kriterias')->cascadeOnDelete();
            $table->unsignedTinyInteger('nilai');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_sub_kriterias');
    }
};
