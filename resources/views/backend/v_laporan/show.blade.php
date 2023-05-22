</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Gaji Serba Sambel Bulan @getNamaBulan($bulan) {{ $tahun }}
    </title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" />

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
    @page {
        size: legal landscape;
    }

    * {
        line-height: 1.5;
        font-size: 14px;
    }

    hr {
        padding-top: 1.5;
        padding-bottom: 1.5;
        border-top: 2px solid black;
    }

    .fs-16 {
        font-size: 18px;
    }

    .fw-bold {
        font-weight: bold;
    }

    .uppercase {
        text-transform: uppercase;
    }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 landscape">
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">
        <!-- Write HTML just like a web page -->
        <article>
            <center>
                <u class="fw-bold uppercase">Laporan Gaji Serba Sambel Bulan @getNamaBulan($bulan) {{ $tahun }}</u>
            </center>
            <br>
            <table width="100%" border="1" cellpadding="1.5" cellspacing="0">
                <thead align="center">
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Hadir</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Lembur</th>
                        <th>Tidak Hadir</th>
                        <th>Izin</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $totalGaji = 0;
                    @endphp
                    @foreach ($absensi as $data)
                    @php
                    $tidakHadir = $data->tidak_hadir;
                    $izin = $data->izin;
                    $lembur = $data->lembur;
                    $tunjangan = $data->karyawan->jabatan->tunjangan_jabatan;
                    $gajiPokok = $data->karyawan->jabatan->gaji_pokok;
                    $totalGaji = $tunjangan + $gajiPokok - ($tidakHadir * 20000) - ($izin * 20000) + ($lembur * 10000);
                    @endphp
                    <tr>
                        <td>{{ $data->karyawan->nama }}</td>
                        <td>{{ $data->karyawan->jabatan->nm_jabatan }}</td>
                        <td>{{ $data->hadir }}</td>
                        <td align="right">@formatRupiah($gajiPokok)</td>
                        <td align="right">@formatRupiah($tunjangan)</td>
                        <td align="right">@formatRupiah($lembur * 10000)</td>
                        <td align="right">@formatRupiah($tidakHadir * 20000)</td>
                        <td align="right">@formatRupiah($izin * 20000)</td>
                        <td align="right">@formatRupiah($totalGaji)</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="8" class="total">Total Gaji Bulan Ini:</th>
                        <th align="right">@formatRupiah($totalGaji)</th>
                    </tr>
                </tbody>
            </table>
            <br>
        </article>
    </section>
</body>

</html>