<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitKerja::create([
            'kode' => '001',
            'nama' => 'Unit Kerja 1'
        ]);

        UnitKerja::create([
            'kode' => '002',
            'nama' => 'Unit Kerja 2'
        ]);
    }
}
