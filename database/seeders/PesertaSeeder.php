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
            'nip' => '1980000001',
            'instansi' => 'UIN SU',
            'unit_kerja' => 'Unit Pusat',
            'jabatan' => 'Kepala Divisi',
            'golongan' => 'IV/a',
            'jenis_kelamin' => 1,
        ]);

        Peserta::create([
            'role' => 'Peserta',
            'nama' => 'Irham Fauzan',
            'nip' => '1980000003',
            'instansi' => 'UIN SU',
            'unit_kerja' => 'Unit Pusat',
            'jabatan' => 'Kepala Divisi',
            'golongan' => 'IV/b',
            'jenis_kelamin' => 1,
        ]);

        Peserta::create([
            'role' => 'Peserta',
            'nama' => 'Dina Afriani',
            'nip' => '1980000002',
            'instansi' => 'UIN SU',
            'unit_kerja' => 'Unit Pusat',
            'jabatan' => 'Kepala Divisi',
            'golongan' => 'IV/a',
            'jenis_kelamin' => 0,
        ]);
    }
}
