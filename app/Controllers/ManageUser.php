<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Myth\Auth\Password;

class ManageUser extends BaseController
{
    public $userModel;
    public $db, $builder;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->db         = \Config\Database::connect();
        $this->builder    = $this->db->table('users');
    }

    public function index()
    { 
        
        $data_users = $this->userModel->getUsers();
        // dd($data_users);
        $data = [
            'title' => "Manajemen User",
            'result' =>$data_users,
        ];
        // dd($data);

        return view('../Views/admin/list_user', $data);
    }

    public function create(){
        helper('form');
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('../Views/admin/create_users', $data);
    }

    public function store(){
        if(!$this->validate([
            'email' => [
                'rules' =>  'required|valid_email|is_unique[users.email,id,{id}]',
                'errors'=>[
                    'required'=>"{field} harus diisi.",
                    'valid_email'=>"Format email salah.",
                    'is_unique'=>"Email sudah terdaftar."
                ]
            ],
            'username' => [
                'rules' =>  'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
                'errors' => [
                    'required'              =>  "{field} harus diisi.",
                    'min_length'            =>  "Panjang karakter minimal 3 huruf.",
                    'max_length'            =>  "Panjang karakter maksimal 30 huruf.",
                    'alpha_numeric_space'   =>  "Hanya boleh berupa angka dan huruf tanpa spasi.",
                    'is_unique'             =>  "Username sudah terdaftar."
                ]
            ]
        ])){
            $validation = \Config\Services::validation(); 
            // dd($validation); 
            return redirect()->to(base_url('/users/create'))->withInput()->with('validation', $validation);
        }

            $user = new UserModel();
            $user->withGroup($this->request->getVar('role'))->save([
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password_hash' => Password::hash("Malariaku"),
                'active' => 1
            ]);
            session()->setFlashdata('success', 'Berhasil Menambahkan User');
            return redirect()->to(base_url('/users'));
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/users');
    }
    
    public function reset($id)
    {
        $this->userModel->save([
            'id'=>$id,
            'password_hash' =>Password::hash("Malariaku"),
        ]);

        session()->setFlashdata('success', 'Reset Pasword Berhasil (Malariaku)');
        return redirect()->to('/users');
    }

    
}
