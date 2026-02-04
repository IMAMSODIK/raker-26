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
        $kode =     [
            "A",
            "B",
            "C",
            "D",
            "E",
            "F",
            "G",
            "H",
            "I",
            "JA",
            "JB",
            "JC",
            "JD",
            "JE",
            "JF",
            "JG",
            "JH",
            "JI",
            "JJ",
            "JK",
            "JL",
            "JM",
            "JN",
            "JO",
            "JP",
            "JQ",
            "JU",
            "JV",
            "JW",
            "JX",
            "JZ"
        ];

        $nama =     [
            "FAKULTAS DAKWAH DAN KOMUNIKASI",
            "FAKULTAS EKONOMI DAN BISNIS ISLAM",
            "FAKULTAS ILMU SOSIAL",
            "FAKULTAS ILMU TARBIYAH DAN KEGURUAN",
            "FAKULTAS KESEHATAN MASYARAKAT",
            "FAKULTAS SAINS DAN TEKNOLOGI",
            "FAKULTAS SYARIAH DAN HUKUM",
            "FAKULTAS USHULUDDIN DAN STUDI ISLAM",
            "PASCASARJANA",
            "LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT",
            "LEMBAGA PENJAMINAN MUTU",
            "SATUAN PENGAWAS INTERNAL",
            "PUSAT PERPUSTAKAAN",
            "PUSAT TEKNOLOGI INFORMASI DAN PANGKALAN DATA",
            "PUSAT PENGEMBANGAN BAHASA",
            "PUSAT MAAHAD AL JAMIYAH",
            "PUSAT PENGEMBANGAN BISNIS",
            "PUSAT LAYANAN INTERNASIONAL",
            "BAGIAN AKADEMIK DAN KEMAHASISWAAN",
            "BIDANG KERJASAMA KELEMBAGAAN DAN HUMAS",
            "TIM KEUANGAN DAN PELAPORAN",
            "BIDANG ORGANISASI DAN KEPEGAWAIAN",
            "BAGIAN UMUM",
            "KOPERTAIS WILAYAH IX SUMUT",
            "WORLD UNIVERSITY RANKING",
            "BIRO REKTOR",
            "ADMISI DAN PROMOSI",
            "TIM SUMBER DAYA MANUSIA",
            "TIM PERENCANAAN",
            "TRACER STUDY",
            "KLINIK UINSU MEDAN "
        ];

        for ($i = 0; $i < count($kode); $i++) {
            UnitKerja::create([
                'kode' => $kode[$i],
                'nama' => $nama[$i]
            ]);
        }
    }
}
