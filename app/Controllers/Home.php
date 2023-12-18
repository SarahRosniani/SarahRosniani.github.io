<?php

namespace App\Controllers;
use Myth\Auth\Config\Auth;
use App\Models\Aturan;
use App\Models\TbGejala1Model;
use App\Models\TbGejalaModel;
use App\Models\UserModel;
use Config\Validation;
use Myth\Auth\Password;

class Home extends BaseController
{

    protected $db, $builder, $build; 
    public $aturanModel, $groupModel;
    public $userModel;

    public function __construct(){
       $this->userModel = new UserModel();
       $this->aturanModel = new TbGejala1Model();
       $this-> db      = \Config\Database::connect();
       $this-> builder = $this->db->table('tb_gejala');
       $this-> build = $this->db->table('users');

    }
    public function index(): string
    {
        return view('diagnosa');
    }

    public function redirect()
{
    if (in_groups('admin')) {
        return redirect()->to('/dashboard_admin');
    } elseif (in_groups('user')) {
        return redirect()->to('/dashboard_user');
    } else {
        return redirect()->to('/');
    }
}

public function profile()
    {
        return view('admin/profile');
    }

    public function edit(){
        $user = $this->userModel->getAdmin(user_id());
        $data = [
            'title' => 'Edit User',
            'user' => $user,
        ];

        // dd($data);

        return view('admin/profile_edit', $data);
    }

    public function update($id){

         // Jika validasi berhasil, lanjutkan dengan proses update
         $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
        ];

        // Load library form validation
        $validation = \Config\Services::validation();

        // Rules untuk validasi
        $rules = [
            'email' => 'required|valid_email',
            'username' => 'required',
        ];

        // Set pesan error untuk validasi
        $messages = [
            'email' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Format email tidak valid.',
            ],
            'username' => [
                'required' => 'Username harus diisi.',
            ],
        ];

        // Set aturan validasi
        $validation->setRules($rules, $messages);
  

            // Lakukan validasi
            $validation = \Config\Services::validation();
            if (!$validation->setRules($rules, $messages)->run($data)) {
                // Jika validasi gagal, kembalikan dengan pesan kesalahan
                session()->setFlashdata('error', $validation->getErrors());
                return redirect()->back()->withInput();
            }

            // Validasi berhasil, lanjutkan dengan pembaruan data
            $this->build->where('id', $id);
            $result = $this->build->update($data);

            if (!$result) {
                session()->setFlashdata('error', 'Gagal Mengubah Profile');
                return redirect()->back()->withInput()
                    ->with('error', 'Gagal mengubah data');
            } else {
                session()->setFlashdata('success', 'Berhasil Mengubah Profile');
                return redirect()->to('/profile');
            }
    }

    public function dashboard_user(){
        return view('about');
    }

    

    public function dashboard_admin(){
        // $this->builder->select('aturan.*');
        // $this->builder->join('penyakit', 'penyakit.id = aturan.id_penyakit');
        // $this->builder->join('gejala', 'gejala.id = aturan.id_penyakit');
        
       
    //     // $query = $this->builder->get();
    
        $data = [
            'gejala_count' => $this->aturanModel->countgejala(),
            'penyakit_count' => $this->aturanModel->countpenyakit(),
    //         // 'aturan' => $query->getResult()
        ];
        return view('dashboard_admin', $data);
    }

    
}
