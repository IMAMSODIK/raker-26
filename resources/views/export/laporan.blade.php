<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$pageTitle}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .report-container {
            padding: 20px;
            margin: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        h3, h4, h5, .tanggal {
            text-align: center;
        }
        .text-center{
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .no-print {
            display: ;
        }
    </style>
</head>
<body>
    {{-- <button class="no-print" onclick="window.print();">Print PDF</button> --}}
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
    @endphp
    <div class="report-container">
        <h3>PENGUATAN TATA KELOLA MENUJU INTERNASIONALISASI UIN SUMATERA UTARA MEDAN</h3>
        <h4>HOTEL NIAGARA PARAPAT</h4>
        <p class="tanggal">02-04 FEBRUARI 2025</p>
        <br><br>
        <h4>DAFTAR REGISTRASI PESERTA</h4>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Peserta</th>
                    <th class="text-center" style="width: 20%">Unit Kerja</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Asal Instansi</th>
                    <th class="text-center" style="width: 10%">Tandan Tangan</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Waktu Registrasi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($pesertas as $peserta)
                    <tr>
                        <td class="text-center">{{$index++}}</td>
                        <td>{{$peserta->nama}} <br> ({{$peserta->nip}})</td>
                        <td>{{($peserta->unitKerja->nama) ?? "-"}}</td>
                        <td class="text-center">{{$peserta->role}}</td>
                        <td>{{$peserta->instansi}}</td>
                        <td>
                            <img width="150px" src="{{asset('storage/ttd') . '/' . $peserta->ttd}}" alt="">
                        </td>
                        <td>
                            <img width="100px" src="{{asset('storage/foto') . '/' . $peserta->foto}}" alt="">
                        </td>
                        <td class="text-center">
                            @if ($peserta->registrasi == 1)
                                {{Carbon::parse($peserta->tgl_registrasi)->translatedFormat('H:i');}} <br>
                                {{Carbon::parse($peserta->tgl_registrasi)->translatedFormat('d F Y');}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br><br>
        <h3>PENGUATAN TATA KELOLA MENUJU INTERNASIONALISASI UIN SUMATERA UTARA MEDAN</h3>
        <h4>HOTEL NIAGARA PARAPAT</h4>
        <p class="tanggal">02-04 FEBRUARI 2025</p>
        <br><br>
        <h4>DAFTAR PRESENSI HARI PERTAMA</h4>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Peserta</th>
                    <th class="text-center" style="width: 20%">Unit Kerja</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Asal Instansi</th>
                    <th class="text-center">Presensi</th>
                    <th class="text-center">Waktu Presensi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($pesertas as $peserta)
                    <tr>
                        <td class="text-center">{{$index++}}</td>
                        <td>{{$peserta->nama}} <br> ({{$peserta->nip}})</td>
                        <td>{{($peserta->unitKerja->nama) ?? "-"}}</td>
                        <td class="text-center">{{$peserta->role}}</td>
                        <td>{{$peserta->instansi}}</td>
                        <td class="text-center">
                            @if ($peserta->absensi1 == 1)
                                Hadir
                            @else
                                <span style="color: red">Tidak Hadir</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($peserta->absensi1 == 1)
                                {{Carbon::parse($peserta->tgl_absensi1)->translatedFormat('H:i');}} <br>
                                {{Carbon::parse($peserta->tgl_absensi1)->translatedFormat('d F Y');}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br><br>
        <h3>PENGUATAN TATA KELOLA MENUJU INTERNASIONALISASI UIN SUMATERA UTARA MEDAN</h3>
        <h4>HOTEL NIAGARA PARAPAT</h4>
        <p class="tanggal">02-04 FEBRUARI 2025</p>
        <br><br>
        <h4>DAFTAR PRESENSI HARI KEDUA</h4>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Peserta</th>
                    <th class="text-center" style="width: 20%">Unit Kerja</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Asal Instansi</th>
                    <th class="text-center">Presensi</th>
                    <th class="text-center">Waktu Presensi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($pesertas as $peserta)
                    <tr>
                        <td class="text-center">{{$index++}}</td>
                        <td>{{$peserta->nama}} <br> ({{$peserta->nip}})</td>
                        <td>{{($peserta->unitKerja->nama) ?? "-"}}</td>
                        <td class="text-center">{{$peserta->role}}</td>
                        <td>{{$peserta->instansi}}</td>
                        <td class="text-center">
                            @if ($peserta->absensi2 == 1)
                                Hadir
                            @else
                                <span style="color: red">Tidak Hadir</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($peserta->absensi2 == 1)
                                {{Carbon::parse($peserta->tgl_absensi2)->translatedFormat('H:i');}} <br>
                                {{Carbon::parse($peserta->tgl_absensi2)->translatedFormat('d F Y');}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br><br>
        <h3>PENGUATAN TATA KELOLA MENUJU INTERNASIONALISASI UIN SUMATERA UTARA MEDAN</h3>
        <h4>HOTEL NIAGARA PARAPAT</h4>
        <p class="tanggal">02-04 FEBRUARI 2025</p>
        <br><br>
        <h4>DAFTAR PRESENSI HARI KETIGA</h4>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Peserta</th>
                    <th class="text-center" style="width: 20%">Unit Kerja</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Asal Instansi</th>
                    <th class="text-center">Presensi</th>
                    <th class="text-center">Waktu Presensi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($pesertas as $peserta)
                    <tr>
                        <td class="text-center">{{$index++}}</td>
                        <td>{{$peserta->nama}} <br> ({{$peserta->nip}})</td>
                        <td>{{($peserta->unitKerja->nama) ?? "-"}}</td>
                        <td class="text-center">{{$peserta->role}}</td>
                        <td>{{$peserta->instansi}}</td>
                        <td class="text-center">
                            @if ($peserta->absensi3 == 1)
                                Hadir
                            @else
                                <span style="color: red">Tidak Hadir</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($peserta->absensi3 == 1)
                                {{Carbon::parse($peserta->tgl_absensi3)->translatedFormat('H:i');}} <br>
                                {{Carbon::parse($peserta->tgl_absensi3)->translatedFormat('d F Y');}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.print()
    </script>
</body>
</html>