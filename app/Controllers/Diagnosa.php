<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\TbGejala1Model;

class Diagnosa extends BaseController
{
    public $gejalaModel;

    public function __construct()
    {
        $this->gejalaModel = new TbGejala1Model();
    }
    
    public function index()
    {
        $dataGejala = $this->gejalaModel->getGejala();
        $data = [

            'gejala' => $dataGejala
        ];
        // dd($data);
        return view('diagnosa', $data);
    }

    public function hasil() {
        $selectedGejala = $this->request->getPost();
        $result = $this->gejalaModel->processGejala($selectedGejala);

        if ($result['status'] == true) {
            $data = $this->gejalaModel->getPenyakitById($result['id']);

            $penyakit = $data['penyakit'];
            $info = $data['info'];
            $solusi = $data['solusi'];

            return view('hasil_diagnosa', compact('penyakit', 'info', 'solusi'));
        } else {
            return view('gejala_error');
        }
    }

   

}
