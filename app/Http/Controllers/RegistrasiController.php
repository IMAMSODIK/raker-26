<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kamar;
use App\Models\Peserta;
use App\Models\UnitKerja;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class RegistrasiController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => "Peserta Terdaftar",
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->get()
        ];
        return view('peserta.peserta_terdaftar', $data);
    }

    public function indexRegistrasi(){
        $data = [
            'pageTitle' => "Peserta Teregistrasi",
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->get()
        ];
        return view('peserta.peserta_teregistrasi', $data);
    }

    public function indexAbsensi(){
        $data = [
            'pageTitle' => "Data Absensi",
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->get()
        ];
        return view('peserta.peserta_absensi', $data);
    }

    public function indexRegistrasiNarasumber(){
        $data = [
            'pageTitle' => "Peserta Teregistrasi",
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->where("role", 'NARASUMBER')->where('registrasi', 1)->get()
        ];
        return view('peserta.narasumber_teregistrasi', $data);
    }

    public function indexAbsensiNarasumber(){
        $data = [
            'pageTitle' => "Data Absensi",
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->where("role", 'NARASUMBER')->get()
        ];
        return view('peserta.narasumber_absensi', $data);
    }

    public function absensi(){
        $data = [
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->get()
        ];
        return view('absensi', $data);
    }

    public function absensiStore(Request $r){
        $data = Peserta::where("id", $r->id)->first();

        if(!$data->registrasi){
            return response()->json([
                'status' => false,
                'message' => "Anda belum melakukan proses registrasi"
            ]);
        }

        $data->absensi1 = 1;
        $data->save();

        return response()->json([
            'status' => 1
        ]);
    }

    public function registrasi(){
        $data = [
            'banks' => DB::table('banks')
                            ->select('nama_bank')
                            ->get(),
            'jabatans' => Jabatan::all(),
            'unit_kerjas' => UnitKerja::all(),
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->get()
        ];
        return view('registrasi', $data);
    }

    public function registrasiProccess(Request $r){
        try {
            $validatedData = $r->validate([
                'nip' => 'required|max:50|unique:pesertas,nip,'.$r->id,
                'jenis_kelamin' => 'required|max:20',
                'golongan' => 'required|max:20',
                'unit_kerja_id' => 'required|string',
                'jabatan_id' => 'required|string',
                'no_wa' => 'required|max:15|unique:pesertas,no_wa,'.$r->id,
                'bank' => 'required|max:200',
                'no_rek' => 'required|max:50|unique:pesertas,no_rek,'.$r->id,
                'ukuran_baju' => 'required|max:5',
            ], [
                'nip.required' => 'NIP Wajib diisi',
                'golongan.required' => 'Golongan Wajib dipilih',
                'nip.max' => 'Nomor Handphone tidak boleh lebih dari 50 karakter.',
                'nip.unique' => 'NIP sudah terdaftar.',
                'jenis_kelamin.required' => 'Jenis Kelamin Wajib dipilih',
                'jenis_kelamin.max' => 'Jenis Kelamin tidak valid',
                'unit_kerja_id.required' => 'Unit Kerja Wajib dipilih',
                'unit_kerja_id.string' => 'Unit Kerja tidak valid',
                'jabatan_id.required' => 'Jabatan Wajib dipilih',
                'jabatan_id.string' => 'Jabatan tidak valid',
                'no_wa.required' => 'Nomor Handphone wajib diisi.',
                'no_wa.max' => 'Nomor Handphone tidak boleh lebih dari 15 karakter.',
                'no_wa.unique' => 'Nomor Handphone sudah terdaftar.',
                'bank.required' => 'Bank wajib diisi.',
                'bank.max' => 'Bank tidak boleh lebih dari 15 karakter.',
                'no_rek.required' => 'Nomor Rekening wajib diisi.',
                'no_rek.max' => 'Nomor Rekening tidak boleh lebih dari 50 karakter.',
                'no_rek.unique' => 'Nomor Rekening sudah terdaftar.',
                'ukuran_baju.required' => 'Ukuran Baju wajib diisi.',
                'ukuran_baju.max' => 'Ukuran Baju tidak boleh lebih dari 5 karakter.',
            ]);

            $peserta = Peserta::where('id', $r->id)->first();

            if($peserta){
                $peserta->nip = $r->nip;
                $peserta->golongan = $r->golongan;
                $peserta->unit_kerja_id = $r->unit_kerja_id;
                $peserta->jabatan_id = $r->jabatan_id;
                $peserta->jenis_kelamin = $r->jenis_kelamin;
                $peserta->no_wa = $r->no_wa;
                $peserta->nama_bank = $r->bank;
                $peserta->no_rek = $r->no_rek;
                $peserta->ukuran_baju = $r->ukuran_baju;
                $peserta->save();

                return redirect()->back()->with('success', 'Pendaftaran berhasil!');
            }
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Semua data harus diisikan!');
        } catch (QueryException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan pada database. Silakan coba lagi.');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan tak terduga. Silakan coba lagi.');
        }
    }

    public function registrasiPeserta(){
        $data = [
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->get()
        ];
        return view('registrasiPeserta', $data);
    }

    public function registrasiStore(Request $r){
        $data = Peserta::where("id", $r->id)->first();
        if(!$data->nip){
            return response()->json([
                'status' => false,
                'message' => "Anda belum melakukan proses pendaftaran"
            ]);
        }

        if ($r->hasFile('foto')) {
            $file = $r->file('foto');
            $fileMimeType = $file->getClientMimeType();
            if ($fileMimeType != 'image/png' && $fileMimeType != 'image/jpg' && $fileMimeType != 'image/jpeg') {
                return response()->json([
                    'status' => false,
                    'message' => "Jenis File Tidak Didukung"
                ]);
            }
            $namaFile = bin2hex(random_bytes(10)) . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('foto', $namaFile, 'public');
            $data->foto = $namaFile;
        }else{
            return response()->json([
                'status' => false,
                'message' => "Silahkan upload foto terlebih dahulu"
            ]);
        }

        if ($r->signature) {
            $signature = $r->signature;
            $decodedData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signature));
            $filename = 'signature-' . $r->nip . uniqid() . '.png';

            // Pastikan folder ada atau buat folder
            $folderPath = 'ttd';
            if (!Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->makeDirectory($folderPath);
            }

            Storage::disk('public')->put($folderPath . '/' . $filename, $decodedData);
            $data->ttd = $filename;
        }else{
            return response()->json([
                'status' => false,
                'message' => "Silahkan masukkan tanda tangan terlebih dahulu"
            ]);
        }

        $data->registrasi = 1;
        $data->save();

        $kamar = Kamar::with(['peserta'])->where('no_kamar', $data->kamar_id)->first();

        return response()->json([
            'status' => 1,
            'kamar' => $kamar,
            'data' => $data
        ]);
    }

    public function store(Request $r){
        $data = Peserta::where("id", $r->id)->first();

        if ($r->hasFile('foto')) {
            $file = $r->file('foto');
            $fileMimeType = $file->getClientMimeType();
            if ($fileMimeType != 'image/png' && $fileMimeType != 'image/jpg' && $fileMimeType != 'image/jpeg') {
                return response()->json([
                    'status' => false,
                    'message' => "Jenis File Tidak Didukung"
                ]);
            }
            $namaFile = bin2hex(random_bytes(10)) . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('foto', $namaFile, 'public');
            $data->foto = $namaFile;
        }else{
            return response()->json([
                'status' => false,
                'message' => "Silahkan upload foto terlebih dahulu"
            ]);
        }

        if ($r->signature) {
            $signature = $r->signature;
            $decodedData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signature));
            $filename = 'signature-' . uniqid() . '.png';

            $folderPath = 'ttd';
            if (!Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->makeDirectory($folderPath);
            }

            Storage::disk('public')->put($folderPath . '/' . $filename, $decodedData);
            $data->ttd = $filename;
        }else{
            return response()->json([
                'status' => false,
                'message' => "Silahkan masukkan tanda tangan terlebih dahulu"
            ]);
        }

        $data->registrasi = 1;
        $waktu = Carbon::parse($data["date"] . ' ' . $data["time"])
            ->setTimezone('Asia/Jakarta')
            ->format('Y-m-d H:i:s');
        $data->tgl_registrasi = $waktu;
        $data->save();

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);   
    }

    public function storeAbsensi(Request $r){
        $data = Peserta::where("id", $r->id)->first();
        if($data->registrasi != 1){
            return response()->json([
                'status' => 0,
                'message' => "Peserta Belum Registrasi"
            ]);
        }
        $waktu = Carbon::parse($data["date"] . ' ' . $data["time"])
            ->setTimezone('Asia/Jakarta')
            ->format('Y-m-d H:i:s');

        if($r->idx == "1"){
            $data->absensi1 = 1;  
            $data->tgl_absensi1 = $waktu;
        }elseif($r->idx == "2"){
            $data->absensi2 = 1;  
            $data->tgl_absensi2 = $waktu;
        }elseif($r->idx == "3"){
            $data->absensi3 = 1;  
            $data->tgl_absensi3 = $waktu;
        }
        $data->save();

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }
}
