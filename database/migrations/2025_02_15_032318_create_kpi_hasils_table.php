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
            $table->foreignId('dinilai_id')->constrained('pegawais')->cascadeOnDelete();
            $table->foreignId('periode_id')->constrained('periode_penilaians')->cascadeOnDelete();
            $table->foreignId('penilai_satu_id')->nullable()->constrained('pegawais')->cascadeOnDelete()->default(null);
            $table->decimal('nilai_oleh_satu')->nullable();
            $table->foreignId('penilai_dua_id')->nullable()->constrained('pegawais')->cascadeOnDelete()->default(null);
            $table->decimal('nilai_oleh_dua')->nullable();
            $table->decimal('nilai_kedisiplinan')->nullable();
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
