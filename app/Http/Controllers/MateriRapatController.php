<?php

namespace App\Http\Controllers;

use App\Models\MateriRapat;
use App\Http\Requests\StoreMateriRapatRequest;
use App\Http\Requests\UpdateMateriRapatRequest;
use App\Models\Dokumentasi;
use Exception;
use Illuminate\Http\Request;

class MateriRapatController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => "Materi Rapat",
            'materis' => MateriRapat::all(),
        ];
        return view('materi_rapat.index', $data);
    }

    public function store(Request $r){
        $validatedData = $r->validate([
            'deskripsi' => 'required|string',
            'file' => 'required|mimes:pdf,ppt,pptx|max:10240',
        ], [
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa text.',
            'file.required' => 'File wajib diupload.',
            'file.mimes' => 'File harus berformat: pdf, ppt, pptx.',
            'file.max' => 'File tidak boleh lebih dari 10MB.',
        ]);

        try{
            $file = $r->file('file');
            $fileMimeType = $file->getClientMimeType();

            if (!in_array($fileMimeType, [
                'application/pdf',
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation'
            ])) {
                return response()->json([
                    'status' => false,
                    'message' => 'Jenis File Tidak Didukung',
                ]);
            }

            $materi = bin2hex(random_bytes(10)) . '.' . $file->getClientOriginalExtension();
            try {
                $file->storePubliclyAs('materi', $materi, 'public');
            } catch (\Exception $e) {
                return null;
            }
            
            $materi = MateriRapat::create([
                'file' => $materi,
                'deskripsi' => $r->deskripsi
            ]);

            if($materi){
                return response()->json([
                    'status' => true,
                    'data' => $materi
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
            $dokumen = MateriRapat::select('id', 'deskripsi')
                            ->where('id', $r->id)
                            ->first();

            if($dokumen){
                return response()->json([
                    'status' => true,
                    'data' => $dokumen
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
            'deskripsi' => 'required|string',
            'id' => 'required|numeric',
        ], [
            'deskripsi.required' => 'Deskripsi Unit Kerja wajib diisi.',
            'deskripsi.string' => 'Deskripsi Unit Kerja harus berupa text.',
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try{
            $file = $r->file('file');
            $fileMimeType = $file->getClientMimeType();

            if (!in_array($fileMimeType, [
                'application/pdf',
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation'
            ])) {
                return response()->json([
                    'status' => false,
                    'message' => 'Jenis File Tidak Didukung',
                ]);
            }

            $materi = bin2hex(random_bytes(10)) . '.' . $file->getClientOriginalExtension();
            try {
                $file->storePubliclyAs('materi', $materi, 'public');
            } catch (\Exception $e) {
                return null;
            }

            $dokumen = MateriRapat::where('id', $r->id)->first();

            if($dokumen){
                $dokumen->deskripsi = $r->deskripsi;
                $dokumen->file = $materi;
                $dokumen->save();

                return response()->json([
                    'status' => true
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
            $dokumen = MateriRapat::select('id')
                            ->where('id', $r->id)
                            ->first();

            if($dokumen){
                $dokumen->delete();
                
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
