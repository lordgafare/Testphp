<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }
    public function auth(){
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_password = password_verify($password, $pass);
            if($verify_password){
              $ses_data =[
                'id' => $data['id'],
                'name' => $data['username'],
                'email' => $data['email'],               
                'isLoggedIn' => true
              ];
              $session->set($ses_data);
              return redirect()->to('/');
            }
            else{
                $session->setFlashdata('msg', 'Worng password');
                return redirect()->to('/login');
            }
            }else{
                $session->setFlashdata('msg', 'Email not found');
                return redirect()->to('/login');
        }
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
