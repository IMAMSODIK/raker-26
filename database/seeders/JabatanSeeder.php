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
        $nama = [
            "REKTOR",
            "SENAT",
            "WAKIL REKTOR I",
            "WAKIL REKTOR II",
            "WAKIL REKTOR III",
            "WAKIL REKTOR IV",
            "DEKAN",
            "KEPALA BIRO",
            "DIREKTUR",
            "WAKIL DIREKTUR",
            "WAKIL DEKAN I",
            "WAKIL DEKAN II",
            "WAKIL DEKAN III",
            "KETUA LEMBAGA",
            "KEPALA PUSAT",
            "KEPALA UPT",
            "KEPALA SPI",
            "KOORDINATOR",
            "SEKRETARIS",
            "KEPALA BAGIAN",
            "KEPALA SUB BAGIAN",
            "PEJABAT PEMBUAT KOMITMEN",
            "PEJABAT PENGADAAN",
            "KETUA TIM",
            "JABATAN FUNGSIONAL AHLI PERTAMA",
            "JABATAN FUNGSIONAL AHLI MUDA",
            "JABATAN FUNGSIONAL MADYA",
            "DOKTER",
            "PERAWAT",
            "STAF PELAKSANA",
            "DRIVER",
            "TENAGA TEKNIS"
        ];

        for($i = 0; $i < count($nama); $i++){
            Jabatan::create([
                'kode' => $i+1,
                'nama' => $nama[$i]
            ]);
        }
    }
}
