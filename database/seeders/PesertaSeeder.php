<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peserta::create([
            'role' => 'Peserta',
            'nama' => 'Ali Imran',
            'instansi' => 'UIN SU',
            'golongan' => 'IV/a',
        ]);

        Peserta::create([
            'role' => 'Peserta',
            'nama' => 'Irham Fauzan',
            'instansi' => 'UIN SU',
            'golongan' => 'IV/b',
        ]);

        Peserta::create([
            'role' => 'Peserta',
            'nama' => 'Dina Afriani',
            'instansi' => 'UIN SU',
            'golongan' => 'IV/a',
        ]);
    }
}
