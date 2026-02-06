<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use App\Models\Jabatan;
use App\Models\Kamar;
use App\Models\UnitKerja;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => "Peserta",
            'pesertas' => Peserta::with(['jabatan', 'unitKerja', 'kamar'])->get(),
            'banks' => DB::table('banks')
                ->select('nama_bank')
                ->get(),
            'jabatans' => Jabatan::all(),
            'unit_kerjas' => UnitKerja::all(),
            'kamars' => Kamar::all(),
        ];
        return view('peserta.index', $data);
    }

    public function daftarNarasumber()
    {
        $data = [
            'pageTitle' => "Narasumber",
            'pesertas' => Peserta::with(['jabatan', 'unitKerja', 'kamar'])->where('role', 'NARASUMBER')->get(),
            'banks' => DB::table('banks')
                ->select('nama_bank')
                ->get(),
            'jabatans' => Jabatan::all(),
            'unit_kerjas' => UnitKerja::all(),
            'kamars' => Kamar::all(),
        ];
        return view('peserta.index_narasumber', $data);
    }

    public function store(Request $r)
    {
        try {
            $peserta = Peserta::create([
                'role' => "Peserta",
                'nama' => $r->nama,
                'nip' => $r->nip,
                'instansi' => "UIN Sumatera Utara Medan",
                // 'unit_kerja_id' => $r->unit_kerja,
                // 'jabatan_id' => $r->jabatan,
                // 'kamar_id' => $r->kamar,
                // 'golongan' => $r->golongan,
                'jenis_kelamin' => $r->jenis_kelamin,
                'no_wa' => $r->no_wa,
                // 'ukuran_baju' => '0',
                // 'no_rek' => $r->no_rek,
                // 'nama_bank' => $r->bank,
            ]);

            if ($peserta) {
                return response()->json([
                    'status' => true,
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => "Terjadi kesalahan saat menyimpan data"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit(Request $r)
    {
        $validatedData = $r->validate([
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try {
            $peserta = Peserta::with(['jabatan', 'unitKerja', 'kamar'])
                ->where('id', $r->id)
                ->first();

            if ($peserta) {
                return response()->json([
                    'status' => true,
                    'data' => $peserta
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => "Data tidak ditemukan"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function detail(Request $r)
    {
        $validatedData = $r->validate([
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try {
            $peserta = Peserta::with(['jabatan:id,nama', 'unitKerja:id,nama', 'kamar:id,no_kamar'])
                ->where('id', $r->id)
                ->first();

            if ($peserta) {
                return response()->json([
                    'status' => true,
                    'data' => $peserta
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => "Data tidak ditemukan"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $r)
    {
        // $validatedData = $r->validate([
        //     'id' => 'required|numeric',
        //     'nama' => 'required|string|max:255',
        //     'nip' => 'required|numeric|digits_between:1,50',
        //     'jenis_kelamin' => 'required|string',
        //     'no_wa' => 'required|numeric|digits_between:1,15',
        //     'role' => 'required|string',
        //     'instansi' => 'nullable|string',
        //     'unit_kerja_id' => 'required|numeric',
        //     'kamar_id' => 'required|numeric',
        //     'jabatan_id' => 'required|numeric',
        //     'golongan' => 'required|string',
        //     'ukuran_baju' => 'required|string',
        //     'no_rek' => 'required|numeric|digits_between:1,50',
        // ], [
        //     'id.required' => 'ID tidak dapat ditemukan',
        //     'id.numeric' => 'ID harus berupa angka',

        //     'nama.required' => 'Nama harus diisi',
        //     'nama.string' => 'Nama harus berupa huruf',
        //     'nama.max' => 'Nama tidak boleh lebih dari 255 karakter',

        //     'nip.required' => 'NIP harus diisi',
        //     'nip.numeric' => 'NIP harus berupa angka',
        //     'nip.digits_between' => 'NIP harus antara 1 hingga 50 angka',

        //     'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
        //     'jenis_kelamin.string' => 'Jenis kelamin harus berupa huruf',

        //     'no_wa.required' => 'Nomor WA harus diisi',
        //     'no_wa.numeric' => 'Nomor WA harus berupa angka',
        //     'no_wa.digits_between' => 'Nomor WA harus antara 1 hingga 15 angka',

        //     'role.required' => 'Role harus diisi',
        //     'role.string' => 'Role harus berupa huruf',

        //     'instansi.string' => 'Instansi harus berupa huruf',

        //     'unit_kerja_id.required' => 'Unit kerja harus diisi',
        //     'unit_kerja_id.numeric' => 'Unit kerja harus berupa angka',

        //     'jabatan_id.required' => 'Jabatan harus diisi',
        //     'jabatan_id.numeric' => 'Jabatan harus berupa angka',

        //     'kamar_id.required' => 'kamar harus diisi',
        //     'kamar_id.numeric' => 'kamar harus berupa angka',

        //     'golongan.required' => 'Golongan harus diisi',
        //     'golongan.string' => 'Golongan harus berupa huruf',

        //     'ukuran_baju.required' => 'ukuran baju harus diisi',
        //     'ukuran_baju.string' => 'ukuran baju harus berupa huruf',

        //     // 'nama_bank.required' => 'Bank harus diisi',
        //     // 'nama_bank.string' => 'Bank harus berupa huruf',

        //     'no_rek.required' => 'Nomor rekening harus diisi',
        //     'no_rek.numeric' => 'Nomor rekening harus berupa angka',
        //     'no_rek.digits_between' => 'Nomor rekening harus antara 1 hingga 50 angka',
        // ]);


        try {
            $peserta = Peserta::find($r->id);

            if (!$peserta) {
                return response()->json([
                    'status' => false,
                    'message' => "Data peserta tidak ditemukan!"
                ], 404);
            }

            $peserta->update([
                'nama' => $r->nama,
                'nip' => $r->nip,
                'jenis_kelamin' => $r->jenis_kelamin,
                'no_wa' => $r->no_wa,
                'role' => $r->role,
                'asal_instansi' => $r->instansi,
                'unit_kerja_id' => $r->unit_kerja_id,
                'jabatan_id' => $r->jabatan_id,
                'kamar_id' => $r->kamar_id,
                'golongan' => $r->golongan,
                'ukuran_baju' => $r->ukuran_baju,
                'nama_bank' => $r->bank,
                'no_rek' => $r->no_rek,
            ]);

            // dd($peserta);

            return response()->json([
                'status' => true,
                'message' => "Data berhasil diperbarui!",
                'data' => $peserta
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Terjadi kesalahan: " . $e->getMessage()
            ]);
        }
    }


    public function delete(Request $r)
    {
        $validatedData = $r->validate([
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try {
            $peserta = Peserta::select('id')
                ->where('id', $r->id)
                ->first();

            if ($peserta) {
                $peserta->delete();

                return response()->json([
                    'status' => true,
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => "Data tidak ditemukan"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
