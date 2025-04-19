<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    */
    public function run(): void
    {
        $this->call([
            DivisiSeeder::class,
            UnitKerjaSeeder::class,
            JabatanSeeder::class,
            PegawaiSeeder::class,
            UserSeeder::class,
            KriteriaSeeder::class,
            SubKriteriaSeeder::class,
            PeriodePenilaianSeeder::class,
            NilaiSubKriteriaSeeder::class,
        ]);
    }
}
