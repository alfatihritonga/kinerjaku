<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Akhir Penilaian</title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            line-height: 2;
        }

        table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
        }

        th,
        td {
            padding: 0 4px;
            word-wrap: break-word;
            text-align: center;
        }

        .table-bordered td,
        th {
            padding: 0 4px;
            border: 1px solid black;
        }

        th.th-no,
        td.td-no {
            width: 1px;
            /* Buat sekecil mungkin */
            white-space: nowrap;
            /* Pastikan angka tidak pecah ke bawah */
        }

        thead {
            background-color: yellow;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        .fs-14 {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td class="fs-14 text-center text-bold">Hasil Akhir Penilaian Pegawai</td>
        </tr>
        <tr>
            <td class="fs-14 text-center text-bold">
                Periode
                {{ optional($hasilKpi->first()->periode)->bulan . ' ' . optional($hasilKpi->first()->periode)->tahun }}
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 12px;"></td>
        </tr>
    </table>

    <table class="table-bordered">
        <thead>
            <tr>
                <th class="th-no" rowspan="2">No</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Divisi</th>
                <th rowspan="2">Unit Kerja</th>
                <th colspan="2">Nilai Berdasarkan Pimpinan</th>
                <th rowspan="2">Total Nilai</th>
                <th rowspan="2">Nilai Kedisiplinan</th>
                <th rowspan="2">Grand Total</th>
            </tr>
            <tr>
                <th>{{ $level == 4 ? 'Ketua' : 'Ketua YBKS/Ketua Stmik/Bendahara YBKS/Waka/KA. Pusdatin' }}</th>
                <th>{{ $level == 4 ? 'Waka' : 'Kaprodi/Kabid/Kasubid' }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasilKpi as $item)
                @php
                    $nilai_1 = $item->nilai_oleh_satu ?? 0;
                    $nilai_2 = $item->nilai_oleh_dua ?? 0;
                    $total_nilai = ($nilai_1 + $nilai_2) / ($nilai_1 && $nilai_2 ? 2 : 1);
                    $grand_total = ($total_nilai + ($item->nilai_kedisiplinan ?? 0)) / 2;
                @endphp
                <tr class="text-center">
                    <td class="td-no">{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $item->pegawai->nama ?? '-' }}</td>
                    <td>{{ optional($item->pegawai->divisi)->nama ?? '-' }}</td>
                    <td>{{ optional($item->pegawai->unitKerja)->nama ?? '-' }}</td>
                    <td>{{ number_format($nilai_1, 2) }}</td>
                    <td>{{ number_format($nilai_2, 2) }}</td>
                    <td>{{ number_format($total_nilai, 2) }}</td>
                    <td>{{ number_format($item->nilai_kedisiplinan ?? 0, 2) }}</td>
                    <td>{{ number_format($grand_total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
