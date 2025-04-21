<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Hasil Akhir Penilaian {{ $level == 5 ? 'Kasubid' : 'Staff' }} -
        Periode
        {{ optional($hasilKpi->first()->periode)->bulan . ' ' . optional($hasilKpi->first()->periode)->tahun }}
    </title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            line-height: 2;
        }

        table {
            border-collapse: collapse;
            /* table-layout: fixed; */
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

        @page {
            size: A4 landscape;
            margin: 20mm;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td class="fs-14 text-center text-bold">Hasil Akhir Penilaian {{ $level == 5 ? 'Kasubid' : 'Staff' }}</td>
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
                <th rowspan="2">No</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Divisi</th>
                <th rowspan="2">Unit Kerja</th>
                <th colspan="2">Nilai Berdasarkan Pimpinan</th>
                <th rowspan="2">Total Nilai</th>
                <th rowspan="2">Nilai Kedisiplinan</th>
                <th rowspan="2">Grand Total</th>
            </tr>
            <tr>
                <th style="max-width: 100px;">
                    {{ $level == 5 ? 'Ketua' : 'Ketua YBKS/Ketua Stmik/Bendahara YBKS/Waka/KA. Pusdatin' }}
                </th>
                <th style="max-width: 100px;">{{ $level == 5 ? 'Waka' : 'Kaprodi/Kabid/Kasubid' }}</th>
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
                    <td>{{ $loop->iteration }}</td>
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

    <table style="width: 100%; margin-top: 50px; table-layout: fixed">
        <tr>
            <td>
                Mengetahui,<br>
                <strong>Ketua STMIK</strong>
                <br><br><br><br>
                <u>Puji Sari Ramadhan, S.Kom., M.Kom.</u>
            </td>
            <td>
                Disetujui,<br>
                <strong>Waka II</strong>
                <br><br><br><br>
                <u>Astri Syahputri, S.Kom., M.Kom.</u>
            </td>
            <td>
                Disusun Oleh,<br>
                <strong>Operator Penilaian</strong>
                <br><br><br><br>
                <u>Ocha Sugiarto, S.Kom.</u>
            </td>
        </tr>
    </table>

</body>

</html>
