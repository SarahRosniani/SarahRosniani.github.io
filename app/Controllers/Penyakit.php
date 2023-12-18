<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Penyakit extends ResourceController
{
    protected $modelName    = 'App\Models\TbPenyakitModel';
    protected $format       = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message'       => 'succes',
            'data_penyakit'   => $this->model->findAll()
        ];

        // return $this->respond($data, 200);
        return view('penyakit', $data);
    }
}
