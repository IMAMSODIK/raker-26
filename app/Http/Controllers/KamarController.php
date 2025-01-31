<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Http\Requests\StoreKamarRequest;
use App\Http\Requests\UpdateKamarRequest;
use Exception;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => "Kamar",
            'kamars' => Kamar::all()
        ];
        return view('kamar.index', $data);
    }

    public function store(Request $r)
    {
        $validatedData = $r->validate([
            'no_kamar' => 'required|numeric'
        ], [
            'no_kamar.required' => 'nomor kamar wajib diisi.',
            'no_kamar.numeric' => 'nomor kamar harus berupa angka.',
        ]);

        try {
            $kamar = Kamar::create([
                // 'kode' => $r->kode,
                'no_kamar' => $r->no_kamar
            ]);

            if ($kamar) {
                return response()->json([
                    'status' => true,
                    'data' => $kamar
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
            $kamar = kamar::select('id', 'no_kamar')
                ->where('id', $r->id)
                ->first();

            if ($kamar) {
                return response()->json([
                    'status' => true,
                    'data' => $kamar
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
        $validatedData = $r->validate([
            // 'kode' => 'required|string',
            'no_kamar' => 'required|numeric',
            'id' => 'required|numeric',
        ], [
            'no_kamar.required' => 'nomor kamar wajib diisi.',
            'no_kamar.numeric' => 'nomor kamar harus berupa angka.',
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try {
            $kamar = Kamar::where('id', $r->id)->first();

            if ($kamar) {
                $kamar->no_kamar = $r->no_kamar;
                $kamar->save();

                return response()->json([
                    'status' => true,
                    'data' => $kamar
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

    public function delete(Request $r)
    {
        $validatedData = $r->validate([
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try {
            $kamar = Kamar::select('id')
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
