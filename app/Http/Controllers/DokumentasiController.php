<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        try {
            $validator = Validator::make($r->all(), [
                'judul'    => 'required|string|max:255',
                'hari'     => 'required|date',
                'foto.*'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'judul.required'    => 'Judul harus diisi',
                'judul.string'      => 'Judul harus berupa huruf',
                'judul.max'         => 'Judul maksimal :max karakter',
                'hari.required'     => 'Hari harus diisi',
                'foto.*.required'   => 'Foto harus diunggah',
                'foto.*.image'      => 'File harus berupa gambar',
                'foto.*.mimes'      => 'Format gambar harus jpeg, png, jpg, atau gif',
                'foto.*.max'        => 'Ukuran gambar tidak boleh lebih dari 2MB',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $fotoNames = [];
            if ($r->hasFile('foto')) {
                foreach ($r->file('foto') as $file) {
                    $filename = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('public/dokumentasi', $filename);
                    $fotoNames[] = $filename;
                }
            }

            $dokumentasi = Dokumentasi::create([
                'judul' => $r->judul,
                'hari'  => $r->hari,
                'foto'  => json_encode($fotoNames),
            ]);

            if ($dokumentasi) {
                return response()->json([
                    'status'  => true,
                    'message' => 'Dokumentasi berhasil ditambahkan',
                    'data'    => $dokumentasi
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Data gagal disimpan',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Error: ' . $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $r)
    {
        try {
            $dokumentasi = Dokumentasi::select('id', 'judul', 'hari', 'foto')
                ->where('id', $r->id)
                ->first();

            if ($dokumentasi) {
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil ditampilkan!',
                    'data'    => [
                        'id'    => $dokumentasi->id,
                        'judul' => $dokumentasi->judul,
                        'hari'  => $dokumentasi->hari,
                        'foto'  => json_decode($dokumentasi->foto, true)
                    ]
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan!'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r)
    {
        try {
            $validatedData = $r->validate([
                'id'    => 'required|exists:dokumentasis,id',
                'judul' => 'required|string|max:255',
                'hari'  => 'required|date',
                'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'id.required'    => 'ID Dokumentasi tidak ditemukan!',
                'judul.required' => 'Judul harus diisi',
                'judul.string'   => 'Judul harus berupa huruf',
                'judul.max'      => 'Judul tidak boleh lebih dari :max karakter',
                'hari.required'  => 'Hari harus diisi',
                'foto.*.image'   => 'File harus berupa gambar',
                'foto.*.mimes'   => 'Format gambar harus jpeg, png, jpg, atau gif',
                'foto.*.max'     => 'Ukuran gambar tidak boleh lebih dari 2MB',
            ]);

            $dokumentasi = Dokumentasi::find($r->id);

            if ($dokumentasi) {
                $existingImages = json_decode($r->existing_images, true) ?? [];

                if ($r->hasFile('foto')) {
                    foreach ($r->file('foto') as $file) {
                        $filename = time() . '-' . $file->getClientOriginalName();
                        $file->storeAs('public/dokumentasi', $filename);
                        $existingImages[] = $filename;
                    }
                }

                $dokumentasi->update([
                    'judul' => $validatedData['judul'],
                    'hari'  => $validatedData['hari'],
                    'foto'  => json_encode($existingImages),
                ]);

                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil diperbarui!',
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $r)
    {
        $validatedData = $r->validate([
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Data belum dipilih.',
            'id.numeric'  => 'Data belum dipilih.',
        ]);

        try {
            $dokumentasi = Dokumentasi::find($r->id);

            if ($dokumentasi) {
                $dokumentasi->delete();

                return response()->json([
                    'status' => true,
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => "Data tidak ditemukan"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
