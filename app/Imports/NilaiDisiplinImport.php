<?php

namespace App\Imports;

use App\Models\KpiHasil;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiDisiplinImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $pegawai = User::where('nip', $row['nip'])->first();
        
        $periodeId = session('periode_id');
        
        if ($pegawai) {
            $kpiHasil = KpiHasil::where('periode_id', $periodeId)
            ->where('dinilai_id', $pegawai->id)
            ->first();

            if ($kpiHasil) {
                // $kpiHasil->update([
                //     'nilai_kediplinan' => $row['nilai_kedisiplinan'],
                // ]);
                $kpiHasil->nilai_kedisiplinan = $row['nilai_kedisiplinan'];
                $kpiHasil->save();

            } else {
                KpiHasil::create([
                    'dinilai_id' => $pegawai->id,
                    'periode_id' => $periodeId,
                    'nilai_kedisiplinan' => $row['nilai_kedisiplinan'],
                ]);
            }
        }
        return null;
    }
}
