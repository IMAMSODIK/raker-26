<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
            vertical-align: middle;
        }

        /* 🔥 JUDUL TANPA KOTAK */
        .title {
            border: none !important;
            text-align: center;
            font-size: 14px;
            padding: 10px;
        }

        /* 🔥 HEADER ABU-ABU */
        .header {
            background-color: #e0e0e0;
        }

        .ttd-img {
            height: 40px;
        }

        thead {
            display: table-header-group;
        }

        tr {
            page-break-inside: avoid;
        }

        .name {
            font-weight: bold;
        }

        .nip {
            font-size: 9px;
        }
    </style>
</head>

<body>

<table>

    <thead>

        <!-- 🔥 JUDUL (NO BORDER / NO BOX) -->
        <tr>
            <th colspan="8" class="title">
                DAFTAR HADIR PANITIA DAN PESERTA PIMPINAN UINSU MEDAN<br>
                MARIANA RESORT & CONVENTION TANGGAL 09-12 FEBRUARI 2026
            </th>
        </tr>

        <!-- HEADER UTAMA (ABU-ABU) -->
        <tr class="header">
            <th rowspan="2">No</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">NIP</th>
            <th rowspan="2">Golongan</th>
            <th rowspan="2">Jabatan</th>
            <th colspan="3">Tanda Tangan</th>
        </tr>

        <!-- SUB HEADER (ABU-ABU JUGA) -->
        <tr class="header">
            <th>09/02/26</th>
            <th>10/02/26</th>
            <th>11/02/26</th>
        </tr>

    </thead>

    <tbody>

        @foreach ($pesertas as $i => $p)
        <tr>

            <td>{{ $i + 1 }}</td>

            <td>
                <div class="name">{{ $p->nama }}</div>
            </td>

            <td class="nip">{{ $p->nip }}</td>

            <td>{{ $p->golongan }}</td>

            <td>{{ $p->jabatan->nama ?? '-' }}</td>

            <td>
                @if($p->ttd)
                    <img class="ttd-img" src="{{ public_path('storage/ttd/'.$p->ttd) }}">
                @endif
            </td>

            <td>
                @if($p->ttd)
                    <img class="ttd-img" src="{{ public_path('storage/ttd/'.$p->ttd) }}">
                @endif
            </td>

            <td>
                @if($p->ttd)
                    <img class="ttd-img" src="{{ public_path('storage/ttd/'.$p->ttd) }}">
                @endif
            </td>

        </tr>
        @endforeach

    </tbody>

</table>

</body>

</html>