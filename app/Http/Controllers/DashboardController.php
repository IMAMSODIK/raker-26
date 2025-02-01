<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'userDaftar' => Peserta::where('nip', '!=', null)->count(),
            'userRegistrasi' => Peserta::where('ttd', '!=', null)->count(),
            'pesertaAbsen1' => Peserta::where('absensi1', '!=', null)->count(),
            'pesertaAbsen2' => Peserta::where('absensi2', '!=', null)->count(),
        ];
        return view('dashboard.index', $data);
    }
}
