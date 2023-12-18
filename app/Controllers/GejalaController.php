<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class GejalaController extends ResourceController
{
    protected $modelName    = 'App\Models\TbGejala1Model';
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
            'data_gejala'   => $this->model->findAll()
        ];

        // return $this->respond($data, 200);
        return view('gejala', $data);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */

    public function create()
    {
        $rules = $this->validate([
            'kode' => 'required',
            'gejala' => 'required',
        ]);
    
        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];
    
            return $this->failValidationErrors($response);
        }
    
        $this->model->insert([
            'kode' => esc($this->request->getVar('kode')),
            'gejala' => esc($this->request->getVar('gejala')),
        ]);
    
        $response = [
            'message' => 'Data Gejala Berhasil ditambahkan'
        ];
    
        // return $this->respondCreated($response);
        return redirect()->to(base_url('/gejala'))->with('success', $response['message']);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */

    public function update($id = null)
{
    $rules = $this->validate([
        'kode' => 'required',
        'gejala' => 'required',
    ]);

    if (!$rules) {
        $response = [
            'message' => $this->validator->getErrors()
        ];

        return $this->failValidationErrors($response);
    }

    $this->model->update($id, [
        'kode' => esc($this->request->getVar('kode')),
        'gejala' => esc($this->request->getVar('gejala')),
    ]);

    $response = [
        'message' => 'Data Gejala Berhasil diubah'
    ];

    // return $this->respond($response, 200);
    return redirect()->to(base_url('gejala'))->with('success', $response['message']);
}


    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */

    public function delete($id = null)
    {
        $this->model->delete($id);
    
        $response = [
            'message' => 'Data Gejala Berhasil dihapus'
        ];
    
        // return $this->respondDeleted($response);
        return redirect()->to(base_url('gejala'))->with('success', $response['message']);
    }


}
