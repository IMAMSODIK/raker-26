<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kit Peserta</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background: #f2f2f2;
        }

        .left {
            text-align: left;
        }

        .ttd {
            height: 40px;
        }
    </style>
</head>

<body>

<h3 style="text-align:center;">Daftar Penerimaan Kit Peserta</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th class="left">Nama</th>
            <th>NIP</th>
            <th>Tumbler</th>
            <th>Buku Panduan</th>
            <th>Lanyard</th>
            <th>Topi</th>
            <th>Baju</th>
            <th>Tanda Tangan</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pesertas as $i => $p)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td class="left">{{ $p->nama }}</td>
            <td>{{ $p->nip }}</td>
            <td>{{ optional($p->kit)->tumbler ? '✓' : '-' }}</td>
            <td>{{ optional($p->kit)->buku_panduan ? '✓' : '-' }}</td>
            <td>{{ optional($p->kit)->lanyard ? '✓' : '-' }}</td>
            <td>{{ optional($p->kit)->topi ? '✓' : '-' }}</td>
            <td>{{ optional($p->kit)->baju ? '✓' : '-' }}</td>
            <td class="ttd"></td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
