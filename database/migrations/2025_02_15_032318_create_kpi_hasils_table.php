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
        Schema::create('kpi_hasils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dinilai_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('periode_id')->constrained('periode_penilaians')->cascadeOnDelete();
            $table->decimal('skor_total');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_hasils');
    }
};
