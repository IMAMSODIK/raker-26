<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportLaporan(){
        $data = [
            'pageTitle' => "Laporan Peserta",
            'pesertas' => Peserta::with('unitKerja')->get()
        ];
        return view('export.laporan', $data);
    }
}
