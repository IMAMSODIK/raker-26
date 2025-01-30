<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => "Peserta",
            'pesertas' => Peserta::with(['jabatan', 'unitKerja'])->get(),
            'banks' => DB::table('banks')
                            ->select('nama_bank')
                            ->get(),
            'jabatans' => Jabatan::all(),
            'unit_kerjas' => UnitKerja::all(),
        ];
        return view('peserta.index', $data);
    }

    public function store(Request $r){
        try{
            $peserta = Peserta::create([
                'role' => $r->role,
                'nama' => $r->nama,
                'nip' => $r->nip,
                'instansi' => $r->asal_instansi,
                'unit_kerja_id' => $r->unit_kerja,
                'jabatan_id' => $r->jabatan,
                'golongan' => $r->golongan,
                'jenis_kelamin' => $r->jenis_kelamin,
                'no_wa' => $r->no_wa,
                'no_rek' => $r->no_rek,
                'nama_bank' => $r->bank,
            ]);

            if($peserta){
                return response()->json([
                    'status' => true,
                ]);    
            }

            return response()->json([
                'status' => false,
                'message' => "Terjadi kesalahan saat menyimpan data"
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    // public function edit(Request $r){
    //     $validatedData = $r->validate([
    //         'id' => 'required|numeric',
    //     ], [
    //         'id.required' => 'Data belum dipilih.',
    //         'id.numeric' => 'Data belum dipilih.',
    //     ]);

    //     try{
    //         $unitKerja = Jabatan::select('id', 'kode', 'nama')
    //                         ->where('id', $r->id)
    //                         ->first();

    //         if($unitKerja){
    //             return response()->json([
    //                 'status' => true,
    //                 'data' => $unitKerja
    //             ]);    
    //         }

    //         return response()->json([
    //             'status' => false,
    //             'message' => "Data tidak ditemukan"
    //         ]);
    //     }catch(Exception $e){
    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }

    // public function update(Request $r){
    //     $validatedData = $r->validate([
    //         'kode' => 'required|string',
    //         'nama' => 'required|string',
    //         'id' => 'required|numeric',
    //     ], [
    //         'kode.required' => 'Kode Unit Kerja wajib diisi.',
    //         'kode.string' => 'Kode Unit Kerja harus berupa text.',
    //         'nama.required' => 'Nama Unit Kerja wajib diisi.',
    //         'nama.string' => 'Nama Unit Kerja harus berupa text.',
    //         'id.required' => 'Data belum dipilih.',
    //         'id.numeric' => 'Data belum dipilih.',
    //     ]);

    //     try{
    //         $unitKerja = Jabatan::where('id', $r->id)->first();

    //         if($unitKerja){
    //             $unitKerja->kode = $r->kode;
    //             $unitKerja->nama = $r->nama;
    //             $unitKerja->save();

    //             return response()->json([
    //                 'status' => true,
    //                 'data' => $unitKerja
    //             ]);    
    //         }

    //         return response()->json([
    //             'status' => false,
    //             'message' => "Terjadi kesalahan saat menyimpan data"
    //         ]);
    //     }catch(Exception $e){
    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }

    // public function delete(Request $r){
    //     $validatedData = $r->validate([
    //         'id' => 'required|numeric',
    //     ], [
    //         'id.required' => 'Data belum dipilih.',
    //         'id.numeric' => 'Data belum dipilih.',
    //     ]);

    //     try{
    //         $unitKerja = Jabatan::select('id')
    //                         ->where('id', $r->id)
    //                         ->first();

    //         if($unitKerja){
    //             $unitKerja->delete();
                
    //             return response()->json([
    //                 'status' => true,
    //             ]);    
    //         }

    //         return response()->json([
    //             'status' => false,
    //             'message' => "Data tidak ditemukan"
    //         ]);
    //     }catch(Exception $e){
    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }
}
