<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Penyakit;
use App\Models\Gejala;

class Aturan extends ResourceController
{
    protected $modelName    = 'App\Models\Aturan';
    protected $format       = 'json';
    public $penyakit;
    public $gejala;
    protected $db, $builder; 

    public function __construct(){
        $this-> db      = \Config\Database::connect();
        $this->penyakit = new Penyakit();
        $this->gejala = new Gejala();
        $this-> builder = $this->db->table('aturan');
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message'       => 'succes',
            'data_aturan'   => $this->model->getGejala(),
            'data_penyakit'   => $this->penyakit->findAll(),
            'data_gejala'   => $this->gejala->findAll()
        ];

        // return $this->respond($data, 200);
        return view('aturan', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = $this->validate([
            'id_penyakit'   => 'required',
            'id_gejala'   => 'required',
        ]);

        if (!$rules) {
            $response= [
                'message'   => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->insert([
            'id_penyakit'       => esc($this->request->getVar('id_penyakit')),
            'id_gejala'       => esc($this->request->getVar('id_gejala')),
        ]);

        $response =[
            'message'       => 'Data Aturan Berhasil ditambahkan'
        ];

        // return $this->respondCreated($response);
        return redirect()->to(base_url('aturan'))->with('success', $response['message']);
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = $this->validate([
            'nama_penyakit'   => 'required',
        ]);

        if (!$rules) {
            $response= [
                'message'   => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->update($id, [
            'nama_penyakit'       => esc($this->request->getVar('nama_penyakit')),
        ]);

        $response =[
            'message'       => 'Data Penyakit Berhasil diubah'
        ];

        // return $this->respond($response, 200);
        return redirect()->to(base_url('aturan'))->with('success', $response['message']);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id); 

        $response =[
            'message'       => 'Data Penyakit Berhasil dihapus'
        ];

        // return $this->respondDeleted($response);
        return redirect()->to(base_url('aturan'))->with('success', $response['message']);
    }
}
