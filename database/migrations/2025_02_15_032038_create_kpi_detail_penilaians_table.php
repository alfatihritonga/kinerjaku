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
        Schema::create('kpi_detail_penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penilaian_id')->constrained('kpi_penilaians')->cascadeOnDelete();
            $table->foreignId('sub_kriteria_id')->constrained('sub_kriterias')->cascadeOnDelete();
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_detail_penilaians');
    }
};
