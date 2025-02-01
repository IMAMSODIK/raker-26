<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Http\Requests\StoreDokumentasiRequest;
use App\Http\Requests\UpdateDokumentasiRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pageTitle' => 'Dokumentasi',
            'dokumentasi' => Dokumentasi::all()
        ];
        return view('dokumentasi.index', $data);
    }

    public function store(Request $r)
    {
        try {
            $validator = Validator::make($r->all(), [
                'judul' => 'required|string|max:255',
                'hari' => 'required|date',
                'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'judul.required' => 'Judul harus diisi',
                'judul.string' => 'Judul harus berupa huruf',
                'judul.max' => 'Judul maksimal :max karakter',
                'hari.required' => 'Hari harus diisi',
                'foto.*.required' => 'Foto harus diunggah',
                'foto.*.image' => 'File harus berupa gambar',
                'foto.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
                'foto.*.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $fotoPaths = [];
            if ($r->hasFile('foto')) {
                foreach ($r->file('foto') as $file) {
                    $filename = time() . '-' . $file->getClientOriginalName();
                    $path = $file->storeAs('public/dokumentasi', $filename);
                    $fotoPaths[] = str_replace('public/', 'storage/', $path);
                }
            }

            $dokumentasi = Dokumentasi::create([
                'judul' => $r->judul,
                'hari' => $r->hari,
                'foto' => json_encode($fotoPaths),
            ]);
            if ($dokumentasi) {
                return response()->json([
                    'status' => true,
                    'message' => 'Dokumentasi berhasil ditambahkan',
                    'data' => $dokumentasi
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'error: ' . $e->getMessage(),
            ]);
        }
    }

    public function edit(Request $r)
    {
        try {
            $dokumentasi = Dokumentasi::select('id', 'judul', 'hari', 'foto')
                ->where('id', $r->id)
                ->first();

            if ($dokumentasi) {
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditampilkan!',
                    'data' => [
                        'id' => $dokumentasi->id,
                        'judul' => $dokumentasi->judul,
                        'hari' => $dokumentasi->hari,
                        'foto' => json_decode($dokumentasi->foto, true) // Decode JSON
                    ]
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan!'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function update(Request $r)
    {
        try {
            $validatedData = $r->validate([
                'id' => 'required|exists:dokumentasis,id',
                'judul' => 'required|string|max:255',
                'hari' => 'required|date',
                'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'id.required' => 'ID Dokumentasi tidak ditemukan!',
                'judul.required' => 'Judul harus diisi',
                'judul.string' => 'Judul harus berupa angka',
                'judul.max' => 'Judul tidak boleh lebih dari :max karakter',
                'hari.required' => 'Hari harus diisi',
                'foto.*.required' => 'Foto harus diunggah',
                'foto.*.image' => 'File harus berupa gambar',
                'foto.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
                'foto.*.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            ]);

            $dokumentasi = Dokumentasi::find($r->id);

            if ($dokumentasi) {
                $existingImages = json_decode($r->existing_images, true) ?? [];

                // Upload gambar baru jika ada
                if ($r->hasFile('foto')) {
                    foreach ($r->file('foto') as $file) {
                        $filename = time() . '-' . $file->getClientOriginalName();
                        $path = $file->storeAs('public/dokumentasi', $filename);
                        $existingImages[] = str_replace('public/', 'storage/', $path);
                    }
                }

                $dokumentasi->update([
                    'judul' => $validatedData['judul'],
                    'hari' => $validatedData['hari'],
                    'foto' => json_encode($existingImages), // Simpan semua gambar
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diperbarui!',
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
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
            $kamar = Dokumentasi::select('id')
                ->where('id', $r->id)
                ->first();

            if ($kamar) {
                $kamar->delete();

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
