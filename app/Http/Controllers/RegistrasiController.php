<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Peserta;
use App\Models\UnitKerja;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class RegistrasiController extends Controller
{
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
                'unit_kerja_id' => 'required|string',
                'jabatan_id' => 'required|string',
                'no_wa' => 'required|max:15|unique:pesertas,no_wa,'.$r->id,
                'bank' => 'required|max:200',
                'no_rek' => 'required|max:50|unique:pesertas,no_rek,'.$r->id,
                'ukuran_baju' => 'required|max:5',
            ], [
                'nip.required' => 'NIP Wajib diisi',
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
}
