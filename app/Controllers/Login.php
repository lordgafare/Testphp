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
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_password = password_verify($password, $pass);
            if ($verify_password) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['username'],
                    'email' => $data['email'],
                    'isLoggedIn' => true
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Worng password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    public function singleUser($id = null)
    {
        $model = new UserModel();
        $data['user_obj'] = $model->where('id', $id)->first(); // แก้ไข $this->$model เป็น $model
        return view('resetpassword', $data);
    }
    public function reset()
    {

        $userID = $this->request->getVar('id');
        $password = $this->request->getVar('password');
        $confpassword = $this->request->getVar('confpassword');

        // ตรวจสอบว่ารหัสผ่านและยืนยันรหัสผ่านตรงกันหรือไม่
        if ($password !== $confpassword) {
            // ถ้ารหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน
            $errorMessage = 'Password & Confirm Password not match';
        } else {
            // ตรวจสอบว่า ID และรหัสผ่านใหม่ไม่ว่างเปล่า
            if (!empty($userID) && !empty($password)) {
                // เข้ารหัสรหัสผ่านใหม่ (เหมือนกับกระบวนการการลงทะเบียน)
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // สร้างอาร์เรย์ข้อมูลที่จะถูกอัปเดตโดยกำหนดรหัสผ่านใหม่เข้าไป
                $data = [
                    'password' => $hashedPassword
                ];

                // สร้าง instance ของ UserModel
                $model = new UserModel();

                // ทำการอัปเดตรหัสผ่านในฐานข้อมูลโดยใช้ ID เป็นเงื่อนไข
                if ($model->update($userID, $data)) {
                    // ส่งผู้ใช้กลับไปยังหน้าหลักหรือหน้าอื่นตามที่คุณต้องการเมื่ออัปเดตสำเร็จ
                    // และแจ้งเตือนผู้ใช้เมื่อรีเซ็ตรหัสผ่านสำเร็จ
                    session()->setFlashdata('success', 'รีเซ็ตรหัสผ่านสำเร็จ');
                    return redirect()->to('/login');
                } else {
                    // หากไม่สามารถอัปเดตรหัสผ่านได้
                    // แจ้งเตือนผู้ใช้
                    $errorMessage = 'ไม่สามารถรีเซ็ตรหัสผ่านได้';
                }
            } else {
                // หากไม่ได้รับ ID หรือรหัสผ่านใหม่ในคำขอ POST
                $errorMessage = 'กรุณากรอก ID และรหัสผ่านใหม่';
            }
        }

        // หากมีข้อความแจ้งเตือนเกิดขึ้น ให้นำไปแสดงบนหน้า resetpassword
        if (isset($errorMessage)) {
            session()->setFlashdata('error', $errorMessage);
            return redirect()->to('/resetpassword/' . $userID);
        }
    }
    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/welcome_message')->with('error', 'ไม่พบข้อมูลผู้ใช้');
        }

        return view('/editprofile', ['user' => $user]);
    }
    public function update($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/welcome_message')->with('error', 'ไม่พบข้อมูลผู้ใช้');
        }

        $rules = [
            'username' => 'required|min_length[2]|max_length[255]',
            'email' => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $file = $this->request->getFile('image_path');

        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);

            // อัปเดตข้อมูลผู้ใช้
            $userModel->update($id, [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'image_path' => $imageName,
            ]);

            return redirect()->to("/editprofile/{$id}")->with('success', 'อัปเดตข้อมูลผู้ใช้เรียบร้อย');
        } else {
            return redirect()->to("/editprofile/{$id}")->with('error', 'ไม่สามารถอัปโหลดรูปภาพได้');
        }
    }
}
