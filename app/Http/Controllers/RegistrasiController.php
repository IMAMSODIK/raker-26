<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
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
            'pesertas' => Peserta::get()
        ];
        return view('registrasi', $data);
    }

    public function registrasiProccess(Request $r){
        try {
            $validatedData = $r->validate([
                'nip' => 'required',
                'no_wa' => 'required|max:15|unique:pesertas,no_wa',
                'bank' => 'required|max:200',
                'no_rek' => 'required|max:50|unique:pesertas,no_rek',
                'ukuran_baju' => 'required|max:5',
            ], [
                'nip.required' => 'Peserta tidak ditemukan',
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

            $peserta = Peserta::where('nip', $r->nip)->first();

            if($peserta){
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
