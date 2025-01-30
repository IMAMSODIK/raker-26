<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use Exception;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => "Jabatan",
            'jabatans' => Jabatan::all()
        ];
        return view('jabatan.index', $data);
    }

    public function store(Request $r){
        $validatedData = $r->validate([
            'kode' => 'required|string',
            'nama' => 'required|string'
        ], [
            'kode.required' => 'Kode Unit Kerja wajib diisi.',
            'kode.string' => 'Kode Unit Kerja harus berupa text.',
            'nama.required' => 'Nama Unit Kerja wajib diisi.',
            'nama.string' => 'Nama Unit Kerja harus berupa text.',
        ]);

        try{
            $unitKerja = Jabatan::create([
                'kode' => $r->kode,
                'nama' => $r->nama
            ]);

            if($unitKerja){
                return response()->json([
                    'status' => true,
                    'data' => $unitKerja
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

    public function edit(Request $r){
        $validatedData = $r->validate([
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try{
            $unitKerja = Jabatan::select('id', 'kode', 'nama')
                            ->where('id', $r->id)
                            ->first();

            if($unitKerja){
                return response()->json([
                    'status' => true,
                    'data' => $unitKerja
                ]);    
            }

            return response()->json([
                'status' => false,
                'message' => "Data tidak ditemukan"
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $r){
        $validatedData = $r->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'id' => 'required|numeric',
        ], [
            'kode.required' => 'Kode Unit Kerja wajib diisi.',
            'kode.string' => 'Kode Unit Kerja harus berupa text.',
            'nama.required' => 'Nama Unit Kerja wajib diisi.',
            'nama.string' => 'Nama Unit Kerja harus berupa text.',
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try{
            $unitKerja = Jabatan::where('id', $r->id)->first();

            if($unitKerja){
                $unitKerja->kode = $r->kode;
                $unitKerja->nama = $r->nama;
                $unitKerja->save();

                return response()->json([
                    'status' => true,
                    'data' => $unitKerja
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

    public function delete(Request $r){
        $validatedData = $r->validate([
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try{
            $unitKerja = Jabatan::select('id')
                            ->where('id', $r->id)
                            ->first();

            if($unitKerja){
                $unitKerja->delete();
                
                return response()->json([
                    'status' => true,
                ]);    
            }

            return response()->json([
                'status' => false,
                'message' => "Data tidak ditemukan"
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
