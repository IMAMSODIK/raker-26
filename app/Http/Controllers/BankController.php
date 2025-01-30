<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => "Bank",
            'banks' => DB::table('banks')->get()
        ];
        return view('bank.index', $data);
    }

    public function store(Request $r){
        $validatedData = $r->validate([
            'nama' => 'required|string'
        ], [
            'nama.required' => 'Nama Bank Kerja wajib diisi.',
            'nama.string' => 'Nama Bank Kerja harus berupa text.',
        ]);

        try{
            $bank = DB::table('banks')->insert([
                'nama_bank' => $r->nama
            ]);

            if($bank){
                return response()->json([
                    'status' => true,
                    'data' => $bank
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
            $bank = DB::table('banks')->where('id', $r->id)->first();

            if($bank){
                return response()->json([
                    'status' => true,
                    'data' => $bank
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
            'nama' => 'required|string',
            'id' => 'required|numeric',
        ], [
            'nama.required' => 'Nama Bank Kerja wajib diisi.',
            'nama.string' => 'Nama Bank Kerja harus berupa text.',
            'id.required' => 'Data belum dipilih.',
            'id.numeric' => 'Data belum dipilih.',
        ]);

        try{
            $bank = DB::table('banks')
                    ->where('id', $r->id)
                    ->update([
                            'nama_bank' => $r->nama,
                        ]);

            if($bank){
                return response()->json([
                    'status' => true,
                    'data' => $bank
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
            $bank = DB::table('banks')->where('id', $r->id)->delete();

            if ($bank) {
                return response()->json([
                    'status' => true,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Data tidak ditemukan"
                ]);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
