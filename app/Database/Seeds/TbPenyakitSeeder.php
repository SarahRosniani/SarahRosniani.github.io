<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TbPenyakitSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'       => 1,
                'penyakit' => 'Malaria',
                'info'     => 'Malaria disebabkan oleh parasit yang ditularkan melalui gigitan nyamuk Anopheles.',
                'solusi'   => 'Konsumsi obat antimalaria sesuai petunjuk medis jika berada di daerah endemis.',
            ],
            [
                'id'       => 2,
                'penyakit' => 'Demam Berdarah (Dengue)',
                'info'     => 'Demam berdarah disebabkan oleh virus dengue yang ditularkan melalui gigitan nyamuk Aedes.',
                'solusi'   => 'Cari bantuan medis segera jika mengalami gejala demam berdarah, terutama jika ada tanda-tanda perdarahan.',
            ],
        ];
        $this->db->table('tb_penyakit')->insertBatch($data);
    }
}
