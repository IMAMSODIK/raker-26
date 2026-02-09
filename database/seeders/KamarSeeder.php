<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nomor = [
            "002",
            "003",
            "004",
            "005",
            "006",
            "008",
            "010",
            "011",
            "012",
            "015",
            "017",
            "019",
            "021",
            "023",
            "025",
            "108",
            "109",
            "110",
            "112",
            "114",
            "115",
            "116",
            "118",
            "120",
            "121",
            "122",
            "123",
            "124",
            "126",
            "127",
            "128",
            "130",
            "131",
            "133",
            "137",
            "202",
            "203",
            "204",
            "206",
            "207",
            "208",
            "209",
            "210",
            "212",
            "214",
            "215",
            "216",
            "218",
            "220",
            "221",
            "222",
            "224",
            "226",
            "227",
            "228",
            "230",
            "231",
            "233",
            "302",
            "304",
            "306",
            "308",
            "310",
            "312",
            "314",
            "320",
            "324",
            "330"
        ];

        for($i = 0; $i < count($nomor); $i++){
            Kamar::create([
                'no_kamar' => $nomor[$i]
            ]);
        }
    }
}
