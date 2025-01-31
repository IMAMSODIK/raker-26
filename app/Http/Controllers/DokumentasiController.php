<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Http\Requests\StoreDokumentasiRequest;
use App\Http\Requests\UpdateDokumentasiRequest;

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
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDokumentasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDokumentasiRequest $request, Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumentasi $dokumentasi)
    {
        //
    }
}
