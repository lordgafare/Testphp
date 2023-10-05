<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        // include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
        $validation = $this->validate([
            'user_name' => [
                'rules' => 'required',
            ]
            ]);
    }
    public function save()
    {
        // include helper form
        helper(['form']);
        $rules =[
            'name' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password' => 'required|min_length[6]|max_length[200]',
            'confpassword' => 'matches[password]',
        ];
        if ($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name' => $this->request->getVar('name'),
                'user_email' => $this->request->getVar('email'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'user_created_at' => date('Y-m-d H:i:s'),
            ];
            $model->save($data);
            return redirect()->to('/login');
        }    else{
            $data = [
                'validation' => $this->validator,
            ];
            echo view('register', $data);
        }
    }
}