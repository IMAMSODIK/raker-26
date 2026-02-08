<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Http\Requests\StoreKitRequest;
use App\Http\Requests\UpdateKitRequest;
use App\Models\Peserta;
use Illuminate\Http\Request;

class KitController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => "Peserta",
            'pesertas' => Peserta::with('kit')->get()
        ];

        return view('kit.index', $data);
    }

    public function edit(Request $r)
    {
        $id = $r->id;
        $peserta = Peserta::findOrFail($id);
        $kit = Kit::where('peserta_id', $id)->first();

        return response()->json([
            'peserta' => $peserta,
            'kit' => $kit
        ]);
    }

    public function update(Request $request)
    {
        try {

            $peserta = Peserta::findOrFail($request->peserta_id);

            $kit = Kit::updateOrCreate(
                ['peserta_id' => $peserta->id],
                [
                    'tumbler' => $request->tumbler,
                    'buku_panduan' => $request->buku_panduan,
                    'lanyard' => $request->lanyard,
                    'topi' => $request->topi,
                    'baju' => $request->baju,
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Data kit berhasil disimpan',
                'kit' => $kit
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage() // hapus di production kalau mau aman
            ], 500);
        }
    }
}
