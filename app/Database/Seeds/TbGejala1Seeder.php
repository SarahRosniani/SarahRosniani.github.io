<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TbGejala1Seeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kode' => 'G001', 'gejala' => 'Demam Tinggi'],
            ['kode' => 'G002', 'gejala' => 'Menggigil'],
            ['kode' => 'G003', 'gejala' => 'Keringat Berlebihan'],
            ['kode' => 'G004', 'gejala' => 'Sakit Kepala Parah'],
            ['kode' => 'G005', 'gejala' => 'Nyeri di Belakang Mata'],
            ['kode' => 'G006', 'gejala' => 'Nyeri Otot dan Sendi'],
            ['kode' => 'G007', 'gejala' => 'Mual dan Muntah'],
            ['kode' => 'G008', 'gejala' => 'Ruam Kulit'],
            ['kode' => 'G009', 'gejala' => 'Nyeri Perut'],
            ['kode' => 'G010', 'gejala' => 'Pendarahan dari Hidung atau Gusi'],
            ['kode' => 'G011', 'gejala' => 'Peningkatan Denyut Jantung'],
            ['kode' => 'G012', 'gejala' => 'Penurunan Jumlah Trombosit'],
            ['kode' => 'G013', 'gejala' => 'Pembengkakan Limpah atau Hati'],
            ['kode' => 'G014', 'gejala' => 'Anemia'],
        ];

        // Insert data ke dalam tabel
        $this->db->table('tb_gejala_1')->insertBatch($data);
    }
}
