<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create([
            'kode' => '001',
            'nama' => 'Jabatan 1'
        ]);

        Jabatan::create([
            'kode' => '002',
            'nama' => 'Jabatan 2'
        ]);
    }
}
